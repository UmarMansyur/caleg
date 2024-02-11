<?php

namespace App\Http\Controllers;

use App\Models\CalonModel;
use App\Models\DetailForm;
use App\Models\FormModel;
use App\Models\SaksiModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class LaporController extends Controller
{
    public function index()
    {
        $report = FormModel::with('tps', 'saksi', 'detail', 'detail.calon');
        if (request()->get('search')) {
            $report = $report->where('tps.nama', 'LIKE', '%' . request()->get('search') . '%')->paginate(10);
        } else {
            $report = $report->paginate(10);
        }
        return view('lapor', compact('report'));
    }

    public function upload()
    {
        $saksi = SaksiModel::all();
        $calon = CalonModel::with('detail')->get();
        $saksi = SaksiModel::where('user_id', auth()->user()->id)->first();
        $form = FormModel::where('saksi_id', $saksi->id)->where('tps_id', $saksi->tps_id)->first();
        if ($form) {
            return view('saksi.upload', compact('saksi', 'calon', 'form'));
        }
        return view('saksi.upload', compact('saksi', 'calon'));
    }

    public function detail($id)
    {
        $report = FormModel::with('tps', 'saksi', 'detail', 'detail.calon')->where('id', $id)->first();
        return view('lapor-detail', compact('report'));
    }


    public function delete($id)
    {
        $report = FormModel::find($id);
        $report->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus laporan');
    }

    public function download($id)
    {
        $report = FormModel::find($id);
        $file = public_path() . "/uploads" . "/" . $report->file_c1;
        return response()->download($file);
    }

    public function create(Request $request)
    {
        try {
            // $saksi = SaksiModel::where('user_id', auth()->user()->id)->first();
            $saksi = SaksiModel::where('user_id', 2)->first();

            if (!$saksi) {
                return response()->json(['status' => 'error', 'message' => 'Saksi tidak ditemukan']);
            }

            $exist = FormModel::where('saksi_id', $saksi->id)->where('tps_id', $saksi->tps_id)->first();
            if ($exist->status == 'verified') {
                return response()->json(['status' => 'error', 'message' => 'Laporan sudah diverifikasi']);
            }

            
            $suara_calon = 0;
            if (empty($exist)) {
                $exist = FormModel::create([
                    'tps_id' => $saksi->tps_id,
                    'saksi_id' => $saksi->id,
                    'jumlah_suara' => $request->get('suara'),
                    'jumlah_suara_sah' => $request->get('suara'),
                    'jumlah_suara_sah_partai' => 0,
                    'jumlah_suara_tidak_sah' => 0,
                    'status' => 'pending',
                ]);      
            }

            $existCalon = DetailForm::where('calon_id', $request->get('calon_id'))->where('form_c1_id', $exist->id)->first();
            if ($existCalon) {
                $suara_calon = $request->get('suara');
                $existCalon->jumlah_suara = $suara_calon;
                $existCalon->save();
            } else {
                $exist = FormModel::where('saksi_id', $saksi->id)->where('tps_id', $saksi->tps_id)->first();
                DetailForm::create([
                    'form_c1_id' => $exist->id,
                    'calon_id' => $request->get('calon_id'),
                    'jumlah_suara' => $request->get('suara')
                ]);
            }

            $jumlah_suara = 0;
            $total = DetailForm::where('form_c1_id', $exist->id)->get();
            foreach ($total as $t) {
                $jumlah_suara += $t->jumlah_suara;
            }

            $exist->jumlah_suara = $jumlah_suara;
            $exist->jumlah_suara_sah = $jumlah_suara;
            $exist->jumlah_suara_sah_partai = 0;
            $exist->jumlah_suara_tidak_sah = 0;
            $exist->save();
            return response()->json(['status' => 'success', 'message' => 'Berhasil menyimpan laporan']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $saksi = SaksiModel::where('id', $request->saksi_id)->first();
            if (!$saksi) {
                Alert::error('Gagal', 'Saksi tidak ditemukan');
                return;
            }
            $report = FormModel::find($id);
            $report->tps_id = $saksi->tps_id;
            $report->saksi_id = $saksi->id;
            $report->jumlah_suara = implode(',', $request->jumlah_suara); // 1,2,3
            $report->jumlah_suara_sah = implode(',', $request->jumlah_suara_sah); // 1,2,3
            $report->jumlah_suara_tidak_sah = implode(',', $request->jumlah_suara_tidak_sah); // 1,2,3
            $report->jumlah_suara_sah_partai = implode(',', $request->jumlah_suara_sah_partai); // 1,2,3
            if ($request->hasFile('file_c1')) {
                if ($report->file_c1 && file_exists(storage_path('app/public/' . $report->file_c1))) {
                    unlink(storage_path('app/public/' . $report->file_c1));
                }
                $report->file_c1 = Storage::put('public', $request->file_c1);
            }
            $report->save();
            foreach ($request->calon_id as $key => $value) {
                $detail = DetailForm::where('form_c1_id', $report->id)->where('calon_id', $value)->first();
                if (!$detail) {
                    $detail = new DetailForm();
                    $detail->form_c1_id = $report->id;
                    $detail->calon_id = $value;
                }
                $jumlah_suara = $request->jumlah_suara_calon[$key];
                $detail->jumlah_suara = implode(',', $jumlah_suara);
                $detail->save();
            }
            Alert::success('Berhasil', 'Berhasil mengubah laporan');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Gagal mengubah laporan');
            return redirect()->back();
        }
    }

    public function laporPartai(Request $request, $id)
    {
        try {
            $report = FormModel::find($id);
            $saksi = SaksiModel::where('user_id', auth()->user()->id)->first();
            if (!$saksi) {
                return response()->json(['status' => 'error', 'message' => 'Saksi tidak ditemukan']);
            }
            dd($report, $saksi);
            if (!$report) {
                $report = FormModel::create([
                    'tps_id' => $saksi->tps_id,
                    'saksi_id' => $saksi->id,
                    'jumlah_suara' => 0,
                    'jumlah_suara_sah' => 0,
                    'jumlah_suara_sah_partai' => 0,
                    'jumlah_suara_tidak_sah' => 0,
                    'status' => 'pending',
                ]);
            }
            $report->jumlah_suara_sah_partai = $request->get('jumlah_suara_sah_partai');
            $report->save();
            Alert::success('Berhasil', 'Berhasil mengubah laporan');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Gagal mengubah laporan');
            return redirect()->back();
        }
    }
    public function laporSuaraTidakSah(Request $request, $id)
    {
        try {
            $report = FormModel::find($id);
            $saksi = SaksiModel::where('user_id', auth()->user()->id)->first();
            if (!$saksi) {
                return response()->json(['status' => 'error', 'message' => 'Saksi tidak ditemukan']);
            }
            if (!$report) {
                $report = FormModel::create([
                    'tps_id' => $saksi->tps_id,
                    'saksi_id' => $saksi->id,
                    'jumlah_suara' => 0,
                    'jumlah_suara_sah' => 0,
                    'jumlah_suara_sah_partai' => 0,
                    'jumlah_suara_tidak_sah' => 0,
                    'status' => 'pending',
                ]);
            }
            $report->jumlah_suara_tidak_sah = $request->jumlah_suara_tidak_sah;
            $report->save();
            Alert::success('Berhasil', 'Berhasil mengubah laporan');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', 'Gagal mengubah laporan');
            return redirect()->back();
        }
    }
}
