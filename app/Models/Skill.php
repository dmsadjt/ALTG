<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_name',
        'skill_priority',
        'skill_img',
    ];

    public function ship(){
        return $this->belongsTo(Ship::class);
    }
}
