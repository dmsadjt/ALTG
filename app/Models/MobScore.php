<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobScore extends Model
{
    use HasFactory;

    protected $table = 'mob_scores';

    protected $fillable = [
        'mob_9_11',
        'mob_12_13',
        'mob_14',
    ];

    public function ship(){
        return $this->belongsTo(Ship::class);
    }
}
