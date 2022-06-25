<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\Rarity;
use App\Models\Faction;
use App\Models\Hull;

class Ship extends Model
{
    use HasFactory;

    protected $table = 'ships';

    public function position(){
        return $this->belongsTo(Position::class);
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
}
