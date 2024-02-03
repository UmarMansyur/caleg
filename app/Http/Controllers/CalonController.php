<?php

namespace App\Http\Controllers;

use App\Models\CalonModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CalonController extends Controller
{
    public function index()
    {
        $calon = CalonModel::paginate(10);
        return view('calon', compact('calon'));
    }

    public function edit(Request $request, $id)
    {
        $calon = CalonModel::find($id);
        $a = $request->all();
        if ($request->hasFile('foto')) {
            if ($calon->foto && file_exists(storage_path('app/public/' . $calon->foto))) {
               unlink(storage_path('app/public/' . $calon->foto));
            }
            $a['foto'] = Storage::putFile('public/foto', $request->file('foto'));

        }

        $calon->update($a);

        Alert::success('Berhasil', 'Data Calon berhasil diubah');
       
        
       
        return redirect()->back();
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'no_urut' => 'required',
                'partai' => 'required',
                'jenis_kelamin' => 'required',
                'foto' => 'required',
            ]);

            $exist = CalonModel::where('no_urut', $request->no_urut)->first();
            if ($exist) {
                Alert::error('Gagal', 'No urut sudah ada');
                return redirect()->back();
            }

            if ($request->hasFile('foto')) {
                $calon = new CalonModel;
                $calon->nama = $request->nama;
                $calon->no_urut = $request->no_urut;
                $calon->partai = $request->partai;
                $calon->jenis_kelamin = $request->jenis_kelamin;
                $calon->foto = Storage::putFile('public/foto', $request->file('foto'));
                $calon->save();
            }

            Alert::success('Berhasil', 'Data Calon berhasil ditambahkan');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showById($id)
    {
        $calon = CalonModel::find($id);
        return view('calon', compact('calon'));
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $calon = CalonModel::find($id);
        if ($calon->foto && file_exists(storage_path('app/public/' . $calon->foto))) {
            unlink(storage_path('app/public/' . $calon->foto));
        }
        $calon->delete();
        return response()->json([
            'message' => 'Data Calon berhasil dihapus'
        ]);
    }
}
