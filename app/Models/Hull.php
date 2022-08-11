<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hull extends Model
{
    use HasFactory;

    protected $table = 'hulls';

    protected $fillable = [
        'hull_name',
        'hull_tag',
        'hull_slug',
        'hull_img',
    ];

    public function ship(){
        return $this->hasMany(Ship::class, 'hull_id');
    }

    public function subs(){
        return $this->hasMany(Subclass::class);
    }
}
