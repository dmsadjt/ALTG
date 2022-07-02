<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;

    protected $table = 'factions';

    public function ship(){
        return $this->hasOne(Ship::class, 'faction_id');
    }

    public function roles(){
        return $this->hasMany(Roles::class,'roles_factions','faction_id','role_id');
    }
}
