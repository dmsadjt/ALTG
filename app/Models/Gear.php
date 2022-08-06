<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gear extends Model
{
    use HasFactory;

    protected $fillable = [
        'gear_name',
        'gear_img',
        'gear_rarity',
        'gear_type',
    ];

    public function ships(){
        return $this->belongsToMany(Ship::class,'ship_gears','gear_id','ship_id')->withPivot('gear_category');
    }

    public function category(){
        return $this->hasOne(GearCategory::class,'id','gear_type');
    }

    public function templates(){
        return $this->hasMany(Template::class,'gear_template','gear_id','template_id');
    }
}
