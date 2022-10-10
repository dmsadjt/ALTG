<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faction;
use Kyslik\ColumnSortable\Sortable;

class Ship extends Model
{
    use HasFactory, Sortable;

    protected $sortable = ['name', 'position_id'];

    protected $fillable = [
        'name',
        'hull_id',
        'notes',
        'faction_id',
        'rarity_id',
        'sprite',
        'chibi_sprite',
        'position_id',
        'general_id',
        'light_id',
        'medium_id',
        'heavy_id',
    ];

    protected $table = 'ships';

    public function positions()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function archetypes()
    {
        return $this->belongsToMany(Archetype::class, 'ship_archetypes', 'ship_id', 'archetype_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'ship_roles', 'ship_id', 'role_id');
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class);
    }

    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }

    public function hull()
    {
        return $this->belongsTo(Hull::class);
    }

    public function mobScore()
    {
        return $this->hasOne(MobScore::class);
    }

    public function bossScore()
    {
        return $this->hasOne(BossScore::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class, 'ship_id');
    }

    public function general()
    {
        return $this->belongsTo(Template::class);
    }

    public function light()
    {
        return $this->belongsTo(Template::class);
    }

    public function medium()
    {
        return $this->belongsTo(Template::class);
    }

    public function heavy()
    {
        return $this->belongsTo(Template::class);
    }

    public function ScopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
