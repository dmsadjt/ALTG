<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ship;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    public function ship(){
        return $this->hasOne(Ship::class);
    }
}
