<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionChild extends Model
{
    use HasFactory;

    public function position(){
        return $this->belongsToMany(Position::class,'position_position','children_id','position_id');
    }
}
