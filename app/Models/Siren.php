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

    public function normal()
    {
        return $this->hasOne(Normal::class);
    }

    public function hard()
    {
        return $this->belongsTo(Hard::class);
    }
}
