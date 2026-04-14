<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'gallery_models';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'status',
        'created_by',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_image',
        'meta_opengraph_title',
        'meta_opengraph_description',
        'meta_opengraph_image',
        'meta_twitter_card',
        'meta_twitter_title',
        'meta_twitter_description',
        'meta_twitter_image',
        'kategori',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
