<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterPengajuanTabunganModel extends Model
{
     use HasFactory, SoftDeletes;
    protected $table = 'master_pengajuan_tabungan';
    protected $fillable = [
        'nama',
        'bunga',
        'min',
        'image'
    ];
}
