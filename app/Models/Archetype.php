<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Archetype extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'archetype_name',
        'archetype_slug',
    ];

    protected $sortable = [
        'archetype_name',
        'archetype_slug',
    ];

    function ships(){
        return $this->belongsToMany(Ship::class, 'ship_archetypes','archetype_id','ship_id');
    }
}
