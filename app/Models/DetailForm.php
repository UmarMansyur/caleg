<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailForm extends Model
{
    use HasFactory;
    protected $table = 'detail_form_c1';
    protected $fillable = [
        'form_c1_id',
        'calon_id',
        'jumlah_suara'
    ];

    public function form()
    {
        return $this->belongsTo(FormModel::class, 'form_c1_id', 'id');
    }

    public function calon()
    {
        return $this->belongsTo(CalonModel::class, 'calon_id', 'id');
    }
    
}
