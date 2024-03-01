<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BossScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'boss_9_11',
        'boss_12_13',
        'boss_14',
        'boss_15',
    ];

    public function user()
    {
        return $this->belongsTo(Ship::class);
    }
}
