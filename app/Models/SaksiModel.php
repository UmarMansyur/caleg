<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaksiModel extends Model
{
    use HasFactory;
    protected $table = 'saksi';
    protected $fillable = ['tps_id', 'user_id'];

    public function tps()
    {
        return $this->belongsTo(TpsModel::class, 'tps_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
