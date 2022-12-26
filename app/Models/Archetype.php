<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Cviebrock\EloquentSluggable\Sluggable;

class Archetype extends Model
{
    use HasFactory, Sortable, Sluggable;

    protected $fillable = [
        'archetype_name',
        'archetype_slug',
    ];

    protected $sortable = [
        'archetype_name',
        'archetype_slug',
    ];

    public function sluggable(): array
    {
        return [
            'archetype_slug' => [
                'source' => 'archetype_name'
            ]
        ];
    }

    function ships()
    {
        return $this->belongsToMany(Ship::class, 'ship_archetypes', 'archetype_id', 'ship_id');
    }
}
