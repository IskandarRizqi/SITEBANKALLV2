<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurContactModel extends Model
{
    use SoftDeletes;
    protected $table = 'our_contact';
    protected $fillable = [
        'category',
        'type',
        'title',
        'url',
        'icon',
        'urutan',
        'created_by',
        'updated_by',
    ];

    protected $appends = ['category_text', 'type_text'];
    public function getCategoryTextAttribute()
    {
        $arr = [
            'Social Media',
            'Contact',
        ];
        return $arr[$this->category] ?? $this->category;
    }
    public function getTypeTextAttribute()
    {
        $arr = [
            'Email',
            'Phone',
            'Mobile',
            'WhatsApp',
            'Facebook',
            'X',
            'Instagram',
            'YouTube',
        ];
        return $arr[$this->type] ?? $this->type;
    }
}
