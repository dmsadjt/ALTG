<?php

namespace App\Http\Livewire;

use App\Models\Hull;
use Livewire\Component;

class AddBoss extends Component
{
    public $bossType;


    public function render()
    {
        $hulls = Hull::all();
        return view('livewire.add-boss', compact('hulls'));
    }
}
