<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\Rarity;

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
}
