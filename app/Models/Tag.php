<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'tags';

    protected $fillable = [
        'tag_label',
        'tag_slug',
    ];

    public function sluggable(): array
    {
        return [
            'tag_slug' => [
                'source' => 'tag_label'
            ]
        ];
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
