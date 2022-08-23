<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ship;

class ShowShips extends Component
{
    public $scoreType;
    public $hull;

    public function render()
    {
        return view('livewire.show-ships', ['ships'=> Ship::where('hull_id', $this->hull ?? '3')->sortable()->paginate(10)]);
    }
}
