<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class MasterProdukPinjaman extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'master_produk_pinjaman';
    protected $fillable = [
        'nama',
        'bunga',
        'min',
        'image'
    ];
}
