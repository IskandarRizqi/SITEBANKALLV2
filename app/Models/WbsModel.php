<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WbsModel extends Model
{
     use HasFactory, SoftDeletes;
    protected $table = "wbs";
    protected $fillable = [
        'bersedia_identitas',
        'nama_pelapor',
        'hp_pelapor',
        'kategori_pelanggaran',
        'nama_terlapor',
        'jabatan_terlapor',
        'lokasi',
        'waktu',
        'deskripsi',
        'bukti',
    ];
}
