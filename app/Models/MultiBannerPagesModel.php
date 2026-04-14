<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MultiBannerPagesModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'multibanner_pages';
    protected $fillable = [
        'page_id',
        'url',
        'active',
        'urutan',
    ];
}
