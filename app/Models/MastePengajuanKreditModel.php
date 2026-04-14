<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MastePengajuanKreditModel extends Model
{
  use HasFactory, SoftDeletes;
    protected $table = 'master_pengajuan_kredit';
    protected $fillable = [
        'nama',
        'tenor',
        'bunga',
        'image'
    ];
}
