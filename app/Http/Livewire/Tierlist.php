<?php

namespace App\Http\Livewire;

use App\Models\Faction;
use App\Models\Hull;
use App\Models\Position;
use App\Models\Rarity;
use App\Models\Roles;
use App\Models\Ship;
use Livewire\Component;


class Tierlist extends Component
{
    public $byHull;
    public $byPosition;
    public $byRole;
    public $byRarities;
    public $byFactions;

    public function filter(){

    }

    public function render(Ship $ship)
    {
        $hulls = Hull::all();
        $factions = Faction::all();
        $rarity = Rarity::all();
        $roles = Roles::all();
        $positions = Position::all();
        $role = Roles::all();
        $roles = array();
        foreach ($role as $r) {
            array_push($roles, $r->role_name);
        }

        $ship = $ship->newQuery();

        if ($byHull) {
            $ship->where('hull_id', $byHull);
        }

        if ($byRole) {
            $ship->with(['roles'])->whereHas('roles', function ($q) use ($roles) {
                $q->whereIn('role_name', $roles);
            });
        }

        if ($byPosition) {

            if ($byPosition == 'tank')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-tank')->orWhere('position_slug', 'vanguard-tank-mid')->orWhere('position_slug', 'vanguard-tank-off_tank');
                });

            if ($byPosition == 'offtank')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug', 'vanguard-offtank')->orWhere('position_slug', 'vanguard-tank-off_tank');
                });

            if ($byPosition == 'mid')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug', 'vanguard-tank-mid')->orWhere('position_slug', 'vanguard-mid');
                });

            if ($byPosition == 'flagship')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-flagship')->orWhere('position_slug', 'submarine-flagship');
                });

            if ($byPosition == 'offflag')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-off_flag')->orWhere('position_slug', 'submarine-off_flag');
                });

            if ($byPosition == 'any')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-any')->orWhere('position_slug', 'submarine-all')->orWhere('position_slug', 'vanguard-any');
                });
        }

        if ($byRarities) {
            $ship->with(['rarity'])->whereHas('rarity', function ($q) use ($byRarities) {
                $q->whereIn('rarity_slug', $byRarities);
            });
        }

        if ($byFactions) {
            $ship->with(['faction'])->whereHas('faction', function ($q) use ($byFactions) {
                $q->whereIn('faction_slug', $byFactions);
            });
        }

        $ships = $ship->sortable()->paginate(10);


        return view('livewire.tierlist', compact('hulls', 'factions', 'ships', 'rarity', 'roles', 'positions', 'byHull', 'byPosition', 'byRole', 'byFactions', 'byRarities'));
    }
}
