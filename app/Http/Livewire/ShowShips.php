<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ship;

class ShowShips extends Component
{
    public $scoreType;

    public function render()
    {
        return view('livewire.show-ships', ['ships'=> Ship::sortable()->paginate(10)]);
    }
}
