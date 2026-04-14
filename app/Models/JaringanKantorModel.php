<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JaringanKantorModel extends Model
{
    use SoftDeletes;
    protected $table = 'jaringan_kantor';
    protected $fillable = [
        'kantor',
        'latitude',
        'longitude',
        'alamat',
        'thumbnail',
        'created_by',
        'updated_by',
        'no_telp',
    ];
}
