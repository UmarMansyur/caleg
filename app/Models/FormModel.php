<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    use HasFactory;
    protected $table = 'form_c1';
    protected $fillable = ['tps_id', 'saksi_id', 'jumlah_suara', 'jumlah_suara_sah_partai', 'jumlah_suara_sah', 'jumlah_suara_tidak_sah', 'file_c1', 'status', 'keterangan'];

    public function tps()
    {
        return $this->belongsTo(TpsModel::class, 'tps_id', 'id');
    }

    public function saksi()
    {
        return $this->belongsTo(SaksiModel::class, 'saksi_id', 'id');
    }

    public function detail()
    {
        return $this->hasMany(DetailForm::class, 'form_c1_id', 'id');
    }
}
