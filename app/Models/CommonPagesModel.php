<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommonPagesModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "common_pages";
    protected $fillable = [
        'type',
        'urutan',
        'tag',
        'kategori',
        'title',
        'slug',
        'banner',
        'thumbnail',
        'content',
        'tanggal_tampil',
        'created_by',
        'updated_by',
    ];
}
