<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siren extends Model
{
    use HasFactory;

    public function hull()
    {
        return $this->belongsTo(Hull::class);
    }

    public function stats()
    {
        return $this->hasMany(Normal::class);
    }
}
