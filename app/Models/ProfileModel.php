<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "profiles";
    protected $fillable = [
        'type',
        'urutan',
        'tag',
        'kategori',
        'title',
        'slug',
        'banner',
        'thumbnail',
        'content'
    ];

    protected $casts = [
        'tag' => 'array',
        'kategori' => 'array',
    ];

    protected $appends = ['tags', 'kategoris', 'type_text'];

    public function getTypeTextAttribute()
    {
        if ($this->type == 0) {
            return 'Profile';
        }
        if ($this->type == 1) {
            return 'Sejarah';
        }
        if ($this->type == 2) {
            return 'Pengurus';
        }
        if ($this->type == 3) {
            return 'Struktur Organisasi';
        }
        return 'Lainnya';
    }
    public function getTagsAttribute()
    {
        return json_decode($this->tag);
    }
    public function getKategorisAttribute()
    {
        return json_decode($this->kategori);
    }

    public function createdby()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function updatedby()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
