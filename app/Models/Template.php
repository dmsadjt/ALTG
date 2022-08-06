<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function gears(){
        return $this->belongsToMany(Gear::class, 'gear_template', 'template_id','gear_id')->withPivot('gear_category');
    }

}
