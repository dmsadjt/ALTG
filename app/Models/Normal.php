<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normal extends Model
{
    use HasFactory;

    public function sirens()
    {
        return $this->belongsTo(Siren::class);
    }

    public function hull()
    {
        return $this->belongsTo(Hull::class, 'siren_id');
    }
}
