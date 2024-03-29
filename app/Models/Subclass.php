<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'hull_id',
        'sub_name',
        'sub_tag',
        'sub_slug',
    ];

    public function hull(){
        return $this->belongsTo(Hull::class);
    }
}
