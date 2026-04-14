<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MasterJenisPengaduanModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'master_jenis_pengaduan';
    protected $fillable = [
        'nama',
        'form',
        'sub_tujuan',
    ];
}
