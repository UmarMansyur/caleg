<?php

namespace App\Http\Controllers;

use App\Models\TpsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class TpsController extends Controller
{
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('tps');
    }

    public function show()
    {
        $tps = TpsModel::all();
        $data = $tps->map((function ($item, $key) {
            return [
                'no' => $key + 1,
                'nama_tps' => $item->nama,
                'desa' => $item->desa,
                'kecamatan' => $item->kecamatan,
                'kode_pos' => $item->kode_pos,
                'id' => Crypt::encrypt($item->id),
            ];
        }));
        return response()->json($data);
    }

    public function showById($id)
    {
        $id = Crypt::decrypt($id);
        $tps = TpsModel::find($id);
        return view('tps', compact('tps'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|unique:tps|max:255',
                'rt_rw' => 'required',
                'desa' => 'required',
                'alamat' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required',
                'kode_pos' => 'required'
            ]);
            TpsModel::create($request->all());
            Alert::success('Berhasil', 'Data TPS berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $request->validate([
                'nama' => 'required|max:255',
                'rt_rw' => 'required',
                'desa' => 'required',
                'alamat' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required',
                'kode_pos' => 'required'
            ]);
            $tps = TpsModel::find($id);
            $tps->update($request->all());
            Alert::success('Berhasil', 'Data TPS berhasil diubah');
            return redirect('/tps');
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $tps = TpsModel::find($id);
            $tps->delete();
            return response()->json([
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
