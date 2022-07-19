<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hull extends Model
{
    use HasFactory;

    protected $table = 'hulls';

    public function ship(){
        return $this->hasMany(Ship::class, 'hull_id');
    }
}
