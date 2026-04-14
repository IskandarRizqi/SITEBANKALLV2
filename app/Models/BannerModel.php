<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "banner";
    protected $fillable = [
        'type',
        'tampil',
        'tampil_start',
        'tampil_end',
        'tag',
        'name',
        'url',
        'url_mobile',
        'created_by',
        'updated_by',
    ];
}
