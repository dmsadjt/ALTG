<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Gear;
use App\Models\GearCategory;
use App\Models\Roles;
use App\Models\Faction;
use App\Models\Position;
use App\Models\Hull;
use App\Models\Rarity;

class ShipController extends Controller
{
    public function index()
    {
        $ships = Ship::get();
        $hulls = Hull::get();
        $rarity = Rarity::get();
        $factions = Faction::get();
        $positions = Position::get();


        return view('ships.index', compact('ships', 'hulls', 'rarity', 'factions', 'positions'));
    }

    public function get($id)
    {

        $ship = Ship::where('id', '=', $id)->first();
        $temp = $ship->skill->sortBy('skill_priority');
        $skill = array();
        foreach ($temp as $t) {
            array_push($skill, $t);
        }

        $test = array();

        $category = GearCategory::get();

        return view('ships.view', compact('ship', 'skill', 'category'));
    }

    public function filter(Request $request, Ship $ship)
    {
        // dd($request);
        $ship = $ship->newQuery();

        $roles = explode(',', $request->role);

        if ($request->filled('role')){
            $ship->with(['roles'])->whereHas('roles', function($q) use($roles){
                $q->whereIn('role_name', $roles);
            });
        }

        if ($request->filled('position')){
            $ship->with(['positions'])->whereHas('positions', function ($q) use($request){
                $q->where('position_id',$request->position);
            });

        }

        if ($request->filled('hull')){
            $ship->where('hull_id', $request->hull);
        }

        if($request->filled('rarity')){
            $ship->with(['rarity'])->whereHas('rarity', function ($q) use($request){
            $q->where('rarity_slug', $request->rarity);
            });
        }

        if($request->filled('faction')){
            $ship->with(['factions'])->whereHas('factions', function ($q) use($request){
            $q->where('faction_slug', $request->faction);
            });
        }

        $ships = $ship->paginate(10);
        $hulls = Hull::get();
        $rarity = Rarity::get();
        $factions = Faction::get();
        $positions = Position::get();

        // dd($ships);

        return view('ships.index', compact('ships', 'hulls', 'rarity', 'factions', 'positions'));


    }
}
