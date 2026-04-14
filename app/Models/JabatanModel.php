<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JabatanModel extends Model
{
     use SoftDeletes;
    protected $table = 'master_jabatan';
    protected $fillable = [
        'nama',
       
    ];
}
