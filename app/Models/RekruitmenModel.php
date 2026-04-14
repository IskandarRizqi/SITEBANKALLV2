<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekruitmenModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "karir_models";
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
        'gambar'
    ];
}
