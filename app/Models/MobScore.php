<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MobScore extends Model
{
    use HasFactory, Sortable;

    protected $table = 'mob_scores';

    protected $fillable = [
        'mob_9_11',
        'mob_12_13',
        'mob_14',
        'mob_15',
    ];

    protected $sortable = [
        'mob_9_11',
        'mob_12_13',
        'mob_14',
        'mob_15',
    ];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }
}
