<?php

namespace App\Http\Livewire;

use App\Models\Gear;
use App\Models\GearCategory;
use Livewire\Component;

class SelectGear extends Component
{
    public $gearCategory;
    public $category_id = '';
    public $gear_id = '';
    public $gears;
    public $selectedGear = '';
    public $selectedCategory = '';


    public function render()
    {
        $this->gears = Gear::where('gear_type', $this->gearCategory ?? '1' )->get();
        return view('livewire.select-gear',[
            'gears' => $this->gears,
            'gear_category'=> GearCategory::all(),
            'selectedCategory'=>$this->selectedCategory,
            'selectedGear'=>$this->selectedGear,
        ]);
    }
}
