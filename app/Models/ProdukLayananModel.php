<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukLayananModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "produk_layanan";
    protected $fillable = [
        'type',
        'kategori',
        'urutan',
        'tag',
        'title',
        'slug',
        'banner',
        'thumbnail',
        'content',
        'brosur',
        'riplay',
        'created_by',
        'updated_by',
    ];
}
