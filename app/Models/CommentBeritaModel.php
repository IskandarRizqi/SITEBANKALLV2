<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentBeritaModel extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'berita_id',
        'email',
        'nama',
        'no_hp',
        'komentar',
        'status',
    ];
}
