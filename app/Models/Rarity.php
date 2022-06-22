<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ship;

class Rarity extends Model
{
    use HasFactory;

    protected $table = 'rarities';

    public function ship(){
        return $this->hasOne(Ship::class, 'rarity_id');
    }
}
