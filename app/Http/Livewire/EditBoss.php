<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hull;

class EditBoss extends Component
{
    public $boss;
    public $bossType;

    public function mount()
    {
        $this->bossType = $this->boss->boss_type;
    }

    public function render()
    {
        $hulls = Hull::all();
        return view('livewire.edit-boss', ['hulls' => $hulls, 'boss' => $this->boss]);
    }
}
