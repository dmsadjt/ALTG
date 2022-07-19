<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hull_id',
        'notes',
        'faction_id',
        'rarity_id',
        'sprite',
        'chibi_sprite',
    ];

    protected $table = 'ships';

    public function positions(){
        return $this->belongsToMany(Position::class, 'ship_positions','ship_id','position_id');
    }

    public function archetypes(){
        return $this->belongsToMany(Archetype::class, 'ship_archetypes','ship_id','archetype_id');
    }

    public function roles(){
        return $this->belongsToMany(Roles::class, 'ship_roles','ship_id','role_id');
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

    public function skill(){
        return $this->hasMany(Skill::class,'ship_id');
    }

    public function gears(){
        return $this->belongsToMany(Gear::class,'ship_gears','ship_id','gear_id')->withPivot('gear_category');
    }

    public function ScopeFilter($query, $filters){
        return $filters->apply($query);
    }
}
