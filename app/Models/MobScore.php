<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobScore extends Model
{
    use HasFactory;

    protected $table = 'mob_scores';

    public function ship(){
        return $this->belongsTo(Ship::class);
    }
}
