<?php

namespace App\Http\Controllers;

use App\Models\CalonModel;
use App\Models\DetailForm;
use App\Models\FormModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ApiSaksi extends Controller
{
    public function index()
    {
        $user = User::with(['saksi', 'saksi.tps'])->where('no_hp', request()->query('saksi'))->where('role', 'saksi')->first();

        if (empty($user)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function getDataForm(Request $request)
    {
        try {
            $user = User::with(['saksi', 'saksi.tps'])->where('no_hp', $request->query('saksi'))->where('role', 'saksi')->first();
            if (auth()->user()->id > 0) {
                $user = User::with(['saksi', 'saksi.tps'])->where('id', auth()->user()->id)->where('role', 'saksi')->first();
            }
            if (empty($user)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda tidak terdaftar sebagai saksi'
                ]);
            }



            $exist = FormModel::where('tps_id', $user->saksi->tps_id)->where('saksi_id', $user->saksi->id)->first();
            if (empty($exist)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda belum melaporkan suara sah, laporkan suara sah terlebih dahulu dengan mengirimkan format: Suara Calon NOMOR_URUT_CALON1#NOMOR_URUT_CALON2#NOMOR_URUT_CALON3#NOMOR_URUT_CALON4#NOMOR_URUT_CALON5#NOMOR_URUT_CALON6#NOMOR_URUT_CALON7#NOMOR_URUT_CALON8'
                ]);
            }

            if ($exist->status == 'verified') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data sudah diverifikasi'
                ]);
            }

            $detail = DetailForm::with(['calon'])->where('form_c1_id', $exist->id)->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'nama_saksi' => $user->name,
                    'nama_tps' => $user->saksi->tps->nama,
                    'desa' => $user->saksi->tps->desa,
                    'kecamatan' => $user->saksi->tps->kecamatan,
                    'kabupaten' => $user->saksi->tps->kabupaten,
                    'jumlah_suara_sah' => $exist->jumlah_suara_sah,
                    'jumlah_suara_tidak_sah' => $exist->jumlah_suara_tidak_sah,
                    'jumlah_suara_sah_partai' => $exist->jumlah_suara_sah_partai,
                    'jumlah_suara' => $exist->jumlah_suara,
                    'file' => $exist->file_c1,
                    'Rincian Suara Calon' => array_map(function ($item) {
                        return [
                            'Nama Calon' => $item['calon']['nama'],
                            'Jumlah Suara' => $item['jumlah_suara']
                        ];
                    }, $detail->toArray())
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function laporFormC1(Request $request)
    {
        try {
            $user = User::with(['saksi', 'saksi.tps'])->where('no_hp', $request->query('saksi'))->where('role', 'saksi')->first();
            if (empty($user)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda tidak terdaftar sebagai saksi'
                ]);
            }
            DB::beginTransaction();
            $exist = FormModel::where('tps_id', $user->saksi->tps_id)->where('saksi_id', $user->saksi->id)->first();
            $suara_sah = 0;


            if (empty($exist)) {
                $exist = FormModel::create([
                    'tps_id' => $user->saksi->tps_id,
                    'saksi_id' => $user->saksi->id,
                    'desa' => $user->saksi->tps->desa,
                    'kecamatan' => $user->saksi->tps->kecamatan,
                    'kabupaten' => $user->saksi->tps->kabupaten,
                    'jumlah_suara' => 0,
                    'jumlah_suara_sah_partai' => $request->jumlah_suara_sah_partai ?? 0,
                    'jumlah_suara_sah' => 0,
                    'jumlah_suara_tidak_sah' => $request->jumlah_suara_tidak_sah ?? 0,
                    'status' => 'pending',
                ]);
            }

            if ($exist->status == 'verified') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data sudah diverifikasi'
                ]);
            }


            $detail = [];
            foreach ($request->detail as $key => $value) {

                $calon = CalonModel::where('no_urut', '0' . ($key + 1))->first();
                if (!empty($calon)) {
                    $check = DetailForm::where('form_c1_id', $exist->id)->where('calon_id', $calon->id)->first();
                    if (empty($check)) {
                        DetailForm::create([
                            'form_c1_id' => $exist->id,
                            'calon_id' => $calon->id,
                            'jumlah_suara' => $value
                        ]);
                    } else {
                        $check->jumlah_suara = $value;
                        $check->save();
                    }
                }
            }
            $suara_sah = DetailForm::where('form_c1_id', $exist->id)->get()->sum('jumlah_suara');
            FormModel::where('id', $exist->id)->update(['jumlah_suara_sah' => $suara_sah, 'jumlah_suara' => $suara_sah + $exist->jumlah_suara_tidak_sah + $exist->jumlah_suara_sah_partai]);
            DB::commit();
            $detail = DetailForm::with(['calon'])->where('form_c1_id', $exist->id)->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'Nama Saksi' => $user->name,
                    'Nama TPS' => $user->saksi->tps->nama,
                    'Desa' => $user->saksi->tps->desa,
                    'Kecamatan' => $user->saksi->tps->kecamatan,
                    'Kabupaten' => $user->saksi->tps->kabupaten,
                    'Jumlah Suara Sah' => $suara_sah,
                    'Jumlah Suara Tidak Sah' => $exist->jumlah_suara_tidak_sah,
                    'Jumlah Suara Sah Partai' => $exist->jumlah_suara_sah_partai,
                    'Jumlah Suara' => $suara_sah + $exist->jumlah_suara_tidak_sah + $exist->jumlah_suara_sah_partai,
                    'Rincian Suara Calon' => array_map(function ($item) {
                        return [
                            'Nama Calon' => $item['calon']['nama'],
                            'Jumlah Suara' => $item['jumlah_suara']
                        ];
                    }, $detail->toArray())

                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function laporSuaraTidakSah(Request $request)
    {
        try {
            $user = User::with(['saksi', 'saksi.tps'])->where('no_hp', $request->query('saksi'))->where('role', 'saksi')->first();
            if (auth()->user() != null || auth()->user() != '') {
                $user = User::with(['saksi', 'saksi.tps'])->where('id', auth()->user()->id)->where('role', 'saksi')->first();
            }
            DB::beginTransaction();
            $exist = FormModel::where('tps_id', $user->saksi->tps_id)->where('saksi_id', $user->saksi->id)->first();
            if (empty($exist)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda belum melaporkan suara sah, laporkan suara sah terlebih dahulu dengan mengirimkan format: Suara Calon NOMOR_URUT_CALON1#NOMOR_URUT_CALON2#NOMOR_URUT_CALON3#NOMOR_URUT_CALON4#NOMOR_URUT_CALON5#NOMOR_URUT_CALON6#NOMOR_URUT_CALON7#NOMOR_URUT_CALON8'
                ]);
            }
            if ($exist->status == 'verified') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data sudah diverifikasi'
                ]);
            }
            $suara_sah = DetailForm::where('form_c1_id', $exist->id)->get()->sum('jumlah_suara');
            $exist->jumlah_suara_tidak_sah = $request->jumlah_suara_tidak_sah;
            $exist->jumlah_suara = $suara_sah + $exist->jumlah_suara_tidak_sah + $exist->jumlah_suara_sah_partai;
            $exist->save();
            DB::commit();
            $detail = DetailForm::with(['calon'])->where('form_c1_id', $exist->id)->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'Nama Saksi' => $user->name,
                    'Nama TPS' => $user->saksi->tps->nama,
                    'Desa' => $user->saksi->tps->desa,
                    'Kecamatan' => $user->saksi->tps->kecamatan,
                    'Kabupaten' => $user->saksi->tps->kabupaten,
                    'Jumlah Suara Sah' => $exist->jumlah_suara_sah,
                    'Jumlah Suara Tidak Sah' => $exist->jumlah_suara_tidak_sah,
                    'Jumlah Suara Sah Partai' => $exist->jumlah_suara_sah_partai,
                    'Jumlah Suara' => $exist->jumlah_suara,
                    'Rincian Suara Calon' => array_map(function ($item) {
                        return [
                            'Nama Calon' => $item['calon']['nama'],
                            'Jumlah Suara' => $item['jumlah_suara']
                        ];
                    }, $detail->toArray())

                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function laporSuaraPartai(Request $request)
    {
        try {
            $user = User::with(['saksi', 'saksi.tps'])->where('no_hp', $request->query('saksi'))->where('role', 'saksi')->first();
            if (auth()->user() != null || auth()->user() != '') {
                $user = User::with(['saksi', 'saksi.tps'])->where('id', auth()->user()->id)->where('role', 'saksi')->first();
            }
            if (empty($user)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda tidak terdaftar sebagai saksi'
                ]);
            }
            DB::beginTransaction();
            $exist = FormModel::where('tps_id', $user->saksi->tps_id)->where('saksi_id', $user->saksi->id)->first();
            if (empty($exist)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda belum melaporkan suara sah, laporkan suara sah terlebih dahulu dengan mengirimkan format: Suara Calon NOMOR_URUT_CALON1#NOMOR_URUT_CALON2#NOMOR_URUT_CALON3#NOMOR_URUT_CALON4#NOMOR_URUT_CALON5#NOMOR_URUT_CALON6#NOMOR_URUT_CALON7#NOMOR_URUT_CALON8'
                ]);
            }
            if ($exist->status == 'verified') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data sudah diverifikasi'
                ]);
            }
            $jumlah_suara = DetailForm::where('form_c1_id', $exist->id)->get()->sum('jumlah_suara');
            $exist->jumlah_suara_sah_partai = $request->jumlah_suara_sah_partai;
            $exist->jumlah_suara_sah = $jumlah_suara + $exist->jumlah_suara_sah_partai;
            $exist->jumlah_suara = $jumlah_suara + $exist->jumlah_suara_sah_partai + $exist->jumlah_suara_tidak_sah;
            $exist->save();
            DB::commit();
            $detail = DetailForm::with(['calon'])->where('form_c1_id', $exist->id)->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'Nama Saksi' => $user->name,
                    'Nama TPS' => $user->saksi->tps->nama,
                    'Desa' => $user->saksi->tps->desa,
                    'Kecamatan' => $user->saksi->tps->kecamatan,
                    'Kabupaten' => $user->saksi->tps->kabupaten,
                    'Jumlah Suara Sah' => $exist->jumlah_suara_sah,
                    'Jumlah Suara Tidak Sah' => $exist->jumlah_suara_tidak_sah,
                    'Jumlah Suara Sah Partai' => $exist->jumlah_suara_sah_partai,
                    'Jumlah Suara' => $exist->jumlah_suara,
                    'Rincian Suara Calon' => array_map(function ($item) {
                        return [
                            'Nama Calon' => $item['calon']['nama'],
                            'Jumlah Suara' => $item['jumlah_suara']
                        ];
                    }, $detail->toArray())

                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function uploadFile(Request $request)
    {
        try {
            $user = User::with(['saksi', 'saksi.tps'])->where('no_hp', $request->query('saksi'))->where('role', 'saksi')->first();
            if (auth()->user() != null || auth()->user() != '') {
                $user = User::with(['saksi', 'saksi.tps'])->where('id', auth()->user()->id)->where('role', 'saksi')->first();
            }
            if (empty($user)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda tidak terdaftar sebagai saksi'
                ]);
            }

            $exist = FormModel::where('tps_id', $user->saksi->tps_id)->where('saksi_id', $user->saksi->id)->first();

            if (empty($exist)) {
                $exist = FormModel::create([
                    'tps_id' => $user->saksi->tps_id,
                    'saksi_id' => $user->saksi->id,
                    'jumlah_suara' => 0,
                    'jumlah_suara_sah' => 0,
                    'jumlah_suara_sah_partai' => 0,
                    'jumlah_suara_tidak_sah' => 0,
                    'status' => 'pending',
                ]);
            }

            if ($exist->status == 'verified') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data sudah diverifikasi'
                ]);
            }

            if ($request->hasFile('file')) {
                if (file_exists(storage_path('app/public/' . $exist->file_c1)) && $exist->file_c1) {
                    unlink(storage_path('app/public/' . $exist->file_c1));
                }
                $exist->file_c1 = Storage::put('public', $request->file('file'));
            }
            $exist->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => [
                    'Nama Saksi' => $user->name,
                    'Nama TPS' => $user->saksi->tps->nama,
                    'Desa' => $user->saksi->tps->desa,
                    'Kecamatan' => $user->saksi->tps->kecamatan,
                    'Kabupaten' => $user->saksi->tps->kabupaten,
                    'Jumlah Suara Sah' => $exist->jumlah_suara_sah,
                    'Jumlah Suara Tidak Sah' => $exist->jumlah_suara_tidak_sah,
                    'Jumlah Suara Sah Partai' => $exist->jumlah_suara_sah_partai,
                    'Jumlah Suara' => $exist->jumlah_suara,
                    'File' => $exist->file
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
