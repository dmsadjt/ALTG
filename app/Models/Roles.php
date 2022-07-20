<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table='roles';

    protected $fillable = [
        'role_name',
        'role_slug',
    ];

    public function ships(){
        return $this->belongsToMany(Ship::class, 'ship_roles','role_id','ship_id');
    }

    public function factions(){
        return $this->belongsToMany(Faction::class, 'roles_factions','role_id','faction_id');
    }
}
