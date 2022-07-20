<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;

    protected $table = 'factions';

    protected $fillable = [
        'faction_name',
        'faction_tag',
        'faction_slug',
        'faction_img',
    ];

    public function ship(){
        return $this->hasMany(Ship::class, 'faction_id');
    }

    public function roles(){
        return $this->hasMany(Roles::class,'roles_factions','faction_id','role_id');
    }
}
