<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normal extends Model
{
    use HasFactory;

    protected $fillable = [
        'siren_id',
        'armor',
        'hull',
        'level',
        'hp',
        'hull_id',
        'fp',
        'trp',
        'aa',
        'avi',
        'acc',
        'eva',
        'lck',
        'spd',
    ];


    public function sirens()
    {
        return $this->belongsTo(Siren::class);
    }

    public function hull()
    {
        return $this->belongsTo(Hull::class, 'hull_id');
    }
}
