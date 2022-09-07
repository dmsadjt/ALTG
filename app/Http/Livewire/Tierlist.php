<?php

namespace App\Http\Livewire;

use App\Models\Faction;
use App\Models\Hull;
use App\Models\Position;
use App\Models\Rarity;
use App\Models\Roles;
use App\Models\Ship;
use Kyslik\ColumnSortable\Sortable;
use Livewire\Component;
use Livewire\WithPagination;

class Tierlist extends Component
{
    use WithPagination;
    use Sortable;

    public $byHull;
    public $position;
    public $byRole;
    public $rarities = [];
    public $byFactions = [];
    public $score="Mob";
    protected $paginationTheme= 'bootstrap';

    public function dehydrate(){
        $this->dispatchBrowserEvent('test');
    }

    public function render(Ship $ship)
    {
        $ship = $ship->newQuery();
        $hulls = Hull::all();
        $factions = Faction::all();
        $rarity = Rarity::all();
        $roles = Roles::all();
        $positions = Position::all();
        $role = Roles::all();//role buat autofill
        $roles = array();//array buat store role
        $roles_exploded = explode(',', $this->byRole);
        // dd($roles_exploded);
        $raritys = $this->rarities;
        $factionsy = $this->byFactions;
        $shipImage = Hull::where('id', $this->byHull ?? 2)->first();

        //masukin array
        foreach ($role as $r) {
            array_push($roles, $r->role_name);
        }

        if ($this->byHull != '') {
            $ship->where('hull_id', $this->byHull);
        }else{
            $ship->where('hull_id', 2);
        }

        if ($this->byRole != '') {
            $ship->with(['roles'])->whereHas('roles', function ($q) use ($roles_exploded) {
                $q->whereIn('role_name', $roles_exploded);
            });
        }

        if ($this->position) {

            if ($this->position == 'tank')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-tank')->orWhere('position_slug', 'vanguard-tank-mid')->orWhere('position_slug', 'vanguard-tank-off_tank');
                });

            if ($this->position == 'offtank')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug', 'vanguard-offtank')->orWhere('position_slug', 'vanguard-tank-off_tank');
                });

            if ($this->position == 'mid')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug', 'vanguard-tank-mid')->orWhere('position_slug', 'vanguard-mid');
                });

            if ($this->position == 'flagship')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-flagship')->orWhere('position_slug', 'submarine-flagship');
                });

            if ($this->position == 'offflag')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-off_flag')->orWhere('position_slug', 'submarine-off_flag');
                });

            if ($this->position == 'any')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-any')->orWhere('position_slug', 'submarine-all')->orWhere('position_slug', 'vanguard-any');
                });
        }

        if ($this->rarities) {
            $ship->with(['rarity'])->whereHas('rarity', function ($q) use ($raritys) {
                $q->whereIn('rarity_slug', $raritys);
            });
        }

        if ($this->byFactions) {
            $ship->with(['faction'])->whereHas('faction', function ($q) use ($factionsy) {
                $q->whereIn('faction_slug', $factionsy);
            });
        }

        $ships = $ship->sortable()->paginate(10);

        return view(
            'livewire.tierlist',
            [
                'ships' => $ships,
                'hulls' => $hulls,
                'factions' => $factions,
                'rarity' => $rarity,
                'roles' => $roles,
                'positions' => $positions,
                'byHull' => $this->byHull,
                'shipImage' => $shipImage,
            ]
        );
    }
}
