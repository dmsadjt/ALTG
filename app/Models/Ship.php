<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $table = 'ships';

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function archetypes(){
        return $this->belongsToMany(Archetype::class, 'ship_archetypes','ship_id','archetype_id');
    }

    public function rarity(){
        return $this->belongsTo(Rarity::class);
    }

    public function faction(){
        return $this->belongsTo(Faction::class);
    }

    public function hull(){
        return $this->belongsTo(Hull::class);
    }

    public function mobScore(){
        return $this->hasOne(MobScore::class);
    }

    public function bossScore(){
        return $this->hasOne(BossScore::class);
    }
}
