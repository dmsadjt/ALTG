<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Roles extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'roles';

    protected $fillable = [
        'role_name',
        'role_slug',
    ];

    public function sluggable(): array
    {
        return [
            'role_slug' => [
                'source' => 'role_name'
            ]
        ];
    }

    public function ships()
    {
        return $this->belongsToMany(Ship::class, 'ship_roles', 'role_id', 'ship_id');
    }

    public function factions()
    {
        return $this->belongsToMany(Faction::class, 'roles_factions', 'role_id', 'faction_id');
    }
}
