<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ship;

class ShipList extends Component
{
    use WithPagination;
    protected $paginationTheme= 'bootstrap';

    public $ships;
    public $score;

    public function mount($ships, $score){
        $this->ships = Ship::all();
        $this->score = $score;
    }

    public function render()
    {
        $shipz = $this->ships;
        return view('livewire.ship-list',[
        'ships'=>$shipz,
        'score'=>$this->score,
        ]);
    }
}
