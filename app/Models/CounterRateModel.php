<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CounterRateModel extends Model
{

    use HasFactory, SoftDeletes;
    protected $table = 'counter_rate';
    protected $fillable = [
        'nama',
        'type',
        'image'
    ];
}
