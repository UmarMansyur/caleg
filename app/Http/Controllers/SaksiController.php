<?php

namespace App\Http\Controllers;
use App\Models\SaksiModel;
use App\Models\TpsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SaksiController extends Controller
{
    public function index()
    {
        $tps = TpsModel::all();
        if($tps->count() == 0){
            Alert::error('Gagal', 'Tambahkan data TPS terlebih dahulu');
            return redirect('/tps');
        }
        $saksi = SaksiModel::with('tps')->paginate(10);
        return view('saksi', compact('tps', 'saksi'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'tps_id' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required|unique:users',
                'no_hp' => 'required|unique:users',
            ]);
            $request['password'] = Hash::make($request->password);
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'thumbnail' => 'https://ik.imagekit.io/8zmr0xxik/user_QwNOYeWtQ.jpeg?updatedAt=1703139730717',
                'role' => 'saksi',
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
            SaksiModel::create([
                'tps_id' => $request->tps_id,
                'user_id' => $user->id,
            ]);
            DB::commit();
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $request->validate([
                'tps_id' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
            ]);
            $saksi = User::find($id);
            if($request->password != null){
                $request['password'] = Hash::make($request->password);
            }else{
                $request['password'] = $saksi->password;
            }
            $user = User::find($saksi->user_id);
            $user->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            SaksiModel::where('user_id', $saksi->user_id)->update([
                'tps_id' => $request->tps_id,
            ]);

            Alert::success('Berhasil', 'Data berhasil diubah');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $id = decrypt($id);
            $saksi = User::find($id);
            $saksi->delete();
            Alert::success('Berhasil', 'Data berhasil dihapus');
            return response()->json(['status' => 'success']);
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->back();
        }
    }
}
