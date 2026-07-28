<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UMKMModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "umkms";
    protected $fillable = [
        'title',
        'lokasi',
        'no_telp',
        'alamat',
        'tipe_discount',
        'nilai_discount',
        'rating',
        'layanan',
        'gambar',
        'thumbnail',
        'deskripsi',
        'jarak',
        'type_pilihan',
        'jam_buka',
        'jam_tutup',
        'sosmed',
        'website',

    ];
}
