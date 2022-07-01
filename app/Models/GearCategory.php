<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GearCategory extends Model
{
    use HasFactory;

    public function gears(){
        return $this->belongsTo(Gear::class);
    }
}
