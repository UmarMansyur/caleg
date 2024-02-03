<?php

namespace App\Http\Controllers;

use App\Models\FormModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class VerifikatorController extends Controller
{

    public function index()
    {
        if(request()->query('search')) {
            $form = FormModel::with('saksi', 'detail', 'detail.calon')->with('tps', function ($query) {
                $query->where('nama', 'like', '%' . request()->query('search') . '%');
            })->where('status', 'pending');
        } else {
            $form = FormModel::with('saksi', 'detail', 'detail.calon')->where('status', 'pending');
        }
        $form = $form->paginate(10);
        return view('validasi', compact('form'));
    }

    public function disetujui()
    {
        if(request()->query('search')) {
            $form = FormModel::with('saksi', 'detail', 'detail.calon')->with('tps', function ($query) {
                $query->where('nama', 'like', '%' . request()->query('search') . '%');
            })->where('status', 'verified');
        } else {
            $form = FormModel::with('saksi', 'detail', 'detail.calon')->where('status', 'verified');
        }
        $form = $form->paginate(10);
        return view('validasi', compact('form'));
    }

    public function ditolak()
    {
        if(request()->query('search')) {
            $form = FormModel::with('saksi', 'detail', 'detail.calon')->with('tps', function ($query) {
                $query->where('nama', 'like', '%' . request()->query('search') . '%');
            })->where('status', 'rejected');
        } else {
            $form = FormModel::with('saksi', 'detail', 'detail.calon')->where('status', 'rejected');
        }
        $form = $form->paginate(10);
        return view('validasi', compact('form'));
    }

    public function detail($id)
    {
        $id = Crypt::decrypt($id);
        $form = FormModel::with('tps', 'saksi', 'saksi.user', 'detail', 'detail.calon')->where('id', $id)->first();
        return view('detail', compact('form'));
    }

    public function verifikasi(Request $request)
    {
        $form = FormModel::find($request->id);
        if ($form == null) {
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
        if ($form->status == 'verified' && $request->status == 'verified') {
            return response()->json(['status' => 'error', 'message' => 'Data sudah diverifikasi']);
        }

        if ($form->status == 'verified' && $request->status == 'rejected') {
            $form->keterangan = $request->keterangan;
        }

        
        $form->status = $request->status;
        $form->save();
        return response()->json(['status' => 'success', 'message' => 'Berhasil memverifikasi data', 'data' => $form]);
    }
    public function revisi(Request $request)
    {
        $form = FormModel::find($request->id);
        if ($form == null) {
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
        if ($form->status == 'verified' && $request->status == 'verified') {
            return response()->json(['status' => 'error', 'message' => 'Data sudah diverifikasi']);
        }

        if ($form->status == 'verified' && $request->status == 'rejected') {
            $form->keterangan = $request->keterangan;
        }

        
        $form->status = $request->status;
        $form->save();
        Alert::success('Berhasil merevisi data');
        return redirect()->back();
    }
}
