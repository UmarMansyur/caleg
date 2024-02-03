<?php

namespace App\Http\Controllers;

use App\Models\CalonModel;
use App\Models\DetailForm;
use App\Models\FormModel;
use App\Models\SaksiModel;
use App\Models\TpsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_tps = TpsModel::count();
        $jumlah_calon = CalonModel::count();
        $saksi = SaksiModel::count();
        $saksi_melapor = FormModel::join('saksi', 'form_c1.saksi_id', '=', 'saksi.id')->count();
        $perolehan_suara = DB::select('SELECT calon.no_urut, calon.nama, SUM(detail_form_c1.jumlah_suara) as jumlah_suara FROM detail_form_c1 JOIN calon ON detail_form_c1.calon_id = calon.id GROUP BY calon.id, calon.nama, calon.no_urut ORDER BY jumlah_suara DESC LIMIT 3');
        $history = FormModel::with('saksi', 'detail', 'detail.calon')->orderBy('created_at', 'desc')->limit(5)->get();
        if(auth()->user()->role == 'saksi') {
            $data = SaksiModel::with('user', 'tps')->where('user_id', auth()->user()->id)->first();
            $form = FormModel::where('saksi_id', $data->id)->first();
            return view('saksi.beranda', compact('jumlah_tps', 'jumlah_calon', 'saksi', 'saksi_melapor', 'perolehan_suara', 'history', 'data', 'form'));
        }
        return view('beranda', compact('jumlah_tps', 'jumlah_calon', 'saksi', 'saksi_melapor', 'perolehan_suara', 'history'));
    }
    public function dataArray()
    {
        $perolehan_suara = DB::select('SELECT calon.no_urut, calon.nama, SUM(detail_form_c1.jumlah_suara) as jumlah_suara FROM detail_form_c1 JOIN calon ON detail_form_c1.calon_id = calon.id GROUP BY calon.id, calon.nama, calon.no_urut');
        return response()->json($perolehan_suara);
    }
}
