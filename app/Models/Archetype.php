<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archetype extends Model
{
    use HasFactory;

    function ships(){
        return $this->belongsToMany(Ship::class, 'ship_archetypes','archetype_id','ship_id');
    }
}
