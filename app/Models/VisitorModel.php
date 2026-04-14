<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitorModel extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ip_address',
        'user_agent',
        'device',
        'browser',
        'os',
        'url',
    ];
}
