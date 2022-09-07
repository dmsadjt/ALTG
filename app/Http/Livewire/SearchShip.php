<?php

namespace App\Http\Livewire;

use App\Models\Ship;
use Livewire\Component;
use Livewire\WithPagination;

class SearchShip extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme= 'bootstrap';

    public function dehydrate(){
        $this->dispatchBrowserEvent('test');
    }

    public function render()
    {
        return view('livewire.search-ship', [
            'ships' => Ship::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }
}
