<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ship;

class Ships extends Component
{
    use WithPagination;
    public $searchTerm = '';
    protected $paginationTheme = 'bootstrap';



    public function render(Ship $ship)
    {
        $ship = $ship->newQuery();
        $ship->with(['hull', 'faction', 'positions', 'archetypes', 'skill', 'mobScore', 'bossScore', 'rarity', 'roles', 'general', 'light', 'medium', 'heavy']);
        if ($this->searchTerm != '') {
            $ship->where('name', 'LIKE', "%{$this->searchTerm}%");
        }
        $ships = $ship->paginate(10);

        return view('livewire.ships', [
            'ships' => $ships,
        ]);
    }
}
