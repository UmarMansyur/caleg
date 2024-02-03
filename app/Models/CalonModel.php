<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonModel extends Model
{
    use HasFactory;
    protected $table = 'calon';
    protected $fillable = [
        'nama', 'no_urut', 'partai', 'jenis_kelamin', 'foto'
    ];

    public function detail()
    {
        return $this->hasMany(DetailForm::class, 'calon_id', 'id');
    }
}
