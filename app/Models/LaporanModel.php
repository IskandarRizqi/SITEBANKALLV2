<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanModel extends Model
{
    use SoftDeletes;
    protected $table = 'laporan';
    protected $fillable = [
        'type',
        'tanggal',
        'title',
        'thumbnail',
        'url',
        'created_by',
        'updated_by',
    ];

    protected $appends = ['type_text'];

    public function getTypeTextAttribute()
    {
        $types = [
            0 => 'Publikasi',
            1 => 'Tahunan',
            2 => 'Tata Kelola',
            3 => 'Keberlanjutan',
            4 => 'Laporan AKB',
            5 => 'Piagam Audit Internal',
            6 => 'Lainnya',
        ];

        return $types[$this->type] ?? 'Lainnya';
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
