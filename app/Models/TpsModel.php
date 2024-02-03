<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TpsModel extends Model
{
    use HasFactory;
    protected $table = 'tps';
    protected $fillable = [
        'nama', 'rt_rw', 'desa', 'alamat', 'kabupaten', 'kecamatan', 'kode_pos'
    ];

    public function saksi()
    {
        return $this->hasMany(SaksiModel::class, 'tps_id', 'id');
    }
}
