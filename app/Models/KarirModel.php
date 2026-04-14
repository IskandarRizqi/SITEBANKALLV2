<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KarirModel extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'judul',
        'deskripsi',
        'kualifikasi',
        'lokasi',
        'tipe_pekerjaan',
        'gaji_min',
        'gaji_max',
        'tanggal_posting',
        'tanggal_berakhir',
        'status',
        'gambar',
    ];
}
