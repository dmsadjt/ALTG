<?php

namespace App\Http\Livewire;

use App\Models\Archetype;
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
    public $byRoleArchetype;
    public $rarities = [];
    public $byFactions = [];
    public $score = "W 14";
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    public $sortType = 'simple';
    protected $paginationTheme = 'bootstrap';


    public function dehydrate()
    {
        $this->dispatchBrowserEvent('test');
        $this->resetPage();
    }

    public function sort($field, $sortType)
    {
        $this->sortBy = $field;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        $this->sortType = $sortType;
    }

    public function render(Ship $ship)
    {
        $ship = $ship->newQuery();
        $hulls = Hull::all();
        $factions = Faction::all();
        $rarity = Rarity::all();
        $roles = Roles::all();
        $positions = Position::all();
        $role = Roles::all(); //role buat autofill
        $archetype = Archetype::all(); // archetype buat autofill
        $role_archetype = array(); //array buat store role
        $roles_exploded = explode(',', $this->byRoleArchetype);
        $raritys = $this->rarities;
        $factionsy = $this->byFactions;
        $shipImage = Hull::where('id', $this->byHull ?? 2)->first();

        //masukin array role
        foreach ($role as $r) {
            array_push($role_archetype, $r->role_name);
        }

        //insert the archetype to array
        foreach ($archetype as $a) {
            array_push($role_archetype, $a->archetype_name);
        }

        if ($this->byRoleArchetype != '') {
            $ship->with(['roles', 'archetypes'])->where(function ($query) use ($roles_exploded) {
                $query->whereHas('roles', function ($q) use ($roles_exploded) {
                    $q->whereIn('role_name', $roles_exploded);
                })->orWhereHas('archetypes', function ($q) use ($roles_exploded) {
                    $q->whereIn('archetype_name', $roles_exploded);
                });
            });
        }

        if ($this->byHull != '') {
            $ship->where('hull_id', $this->byHull);
        } else {
            $ship->where('hull_id', 2);
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



        if ($this->sortType == 'simple') {
            $ships = $ship->orderBy($this->sortBy, $this->sortDirection)->paginate(10);
        }

        if ($this->sortType == 'complex') {
            if ($this->sortBy == 'mob_9_11' || $this->sortBy == 'mob_12_13' || $this->sortBy == 'mob_14') {
                $ships = $ship->join('mob_scores', 'ships.id', '=', 'mob_scores.ship_id')->orderBy('mob_scores.' . $this->sortBy, $this->sortDirection)->paginate(10);
            } else {
                $ships = $ship->join('boss_scores', 'ships.id', '=', 'boss_scores.ship_id')->orderBy('boss_scores.' . $this->sortBy, $this->sortDirection)->paginate(10);
            }
        }

        // dd($ships);
        return view(
            'livewire.tierlist',
            [
                'ships' => $ships,
                'hulls' => $hulls,
                'factions' => $factions,
                'rarity' => $rarity,
                'roles' => $role_archetype,
                'positions' => $positions,
                'byHull' => $this->byHull,
                'shipImage' => $shipImage,
            ]
        );
    }
}
