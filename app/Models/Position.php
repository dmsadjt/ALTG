<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ship;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'explanation',
    ];

    public function ships(){
        return $this->hasMany(Ship::class);
    }

    public function children(){
        return $this->belongsToMany(PositionChild::class,'position_position','position_id','children_id');
    }
}
