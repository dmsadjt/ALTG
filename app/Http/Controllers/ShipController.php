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
use App\Models\Archetype;
use App\Models\Skill;
use App\Models\MobScore;
use App\Models\BossScore;
use App\Models\Template;

class ShipController extends Controller
{

    function urut($collection, $index, $orderBy){
        if($orderBy == 'asc'){
            $res = $collection->getCollection()->sortBy($index)->values();
        }
        elseif($orderBy == 'desc'){
            $res = $collection->getCollection()->sortByDesc($index)->values();
        }

        return $res;
    }


    public function index()
    {
        $ships = Ship::where('hull_id',2)->sortable()->paginate(10);
        $hulls = Hull::get();
        $rarity = Rarity::get();
        $factions = Faction::get();
        $positions = Position::get();
        $selected['hull'] = '2';
        $selected['position'] = '';

        $selected['rarity'] = array();
        $selected['faction'] = array();
        $selected['role'] = '';

        $role = Roles::all();
        $roles = array();
        foreach($role as $r){
            array_push($roles, $r->role_name);
        }


        return view('ships.index', compact('ships', 'hulls', 'rarity', 'factions', 'positions','roles','selected'));
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
        $ship = $ship->newQuery();

        $roles = explode(',', $request->role);

        $selected['position'] = $request['position'];


        if ($request->filled('role')){
            $ship->with(['roles'])->whereHas('roles', function($q) use($roles){
                $q->whereIn('role_name', $roles);
            });
        }

        if ($request->filled('position')){

            if($request['position'] == 'tank')
            $ship->with(['positions'])->whereHas('positions', function ($q){
                $q->where('position_slug', 'vanguard-tank')->orWhere('position_slug','vanguard-tank-mid')->orWhere('position_slug','vanguard-tank-off_tank');
            });

            if($request['position'] == 'offtank')
            $ship->with(['positions'])->whereHas('positions', function ($q){
                $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug','vanguard-offtank')->orWhere('position_slug','vanguard-tank-off_tank');
            });

            if($request['position'] == 'mid')
            $ship->with(['positions'])->whereHas('positions', function ($q){
                $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug','vanguard-tank-mid')->orWhere('position_slug','vanguard-mid');
            });

            if($request['position'] == 'flagship')
            $ship->with(['positions'])->whereHas('positions', function ($q){
                $q->where('position_slug', 'backline-flagship')->orWhere('position_slug','submarine-flagship');
            });

            if($request['position'] == 'offflag')
            $ship->with(['positions'])->whereHas('positions', function ($q){
                $q->where('position_slug', 'backline-off_flag')->orWhere('position_slug','submarine-off_flag');
            });

            if($request['position'] == 'any')
            $ship->with(['positions'])->whereHas('positions', function ($q){
                $q->where('position_slug', 'backline-any')->orWhere('position_slug','submarine-all')->orWhere('position_slug','vanguard-any');
            });
        }

        if ($request->filled('hull')){
            $ship->where('hull_id', $request->hull);
        }

        if($request->filled('rarity')){
                $ship->with(['rarity'])->whereHas('rarity', function ($q) use($request){
                    $q->whereIn('rarity_slug', $request->rarity);
                });

        }

        if($request->filled('faction')){
                $ship->with(['faction'])->whereHas('faction', function ($q) use($request){
                    $q->whereIn('faction_slug', $request->faction);
                });

        }

        $selected['rarity'] = ($request->rarity) ? ($request->rarity) : array();
        $selected['faction'] = ($request->faction) ? ($request->faction) : array();
        $selected['role'] = $request['role'] ? $request['role'] : '';



        $ships = $ship->sortable()->paginate(10);
        $hulls = Hull::get();
        $rarity = Rarity::get();
        $factions = Faction::get();
        $positions = Position::get();
        $selectedHull = Hull::where('id',$request['hull']);


        $selected['hull'] = $request['hull'];

        $role = Roles::all();
        $roles = array();
        foreach($role as $r){
            array_push($roles, $r->role_name);
        }

        return view('ships.index', compact('ships', 'hulls', 'rarity', 'factions', 'positions','roles','selected','selectedHull'));


    }

    //database
    public function addShips()
    {
        $hulls = Hull::all();
        $rarities = Rarity::all();
        $positions = Position::all();
        $roles = Roles::all();
        $archetypes = Archetype::all();
        $factions = Faction::all();
        $gears = Gear::all();
        $gear_category = GearCategory::all();
        $templates = Template::all();

        return view('admin.ship.add', compact(
            'hulls',
            'rarities',
            'positions',
            'roles',
            'archetypes',
            'factions',
            'gears',
            'gear_category',
            'templates',
        ));
    }

    public function postShip(Request $request)
    {
        $cate = GearCategory::all();
        $general = ([
            'name' => 'required',
            'hull' => 'required',
            'rarity' => 'required',
            'position' => 'required',
            'faction' => 'required',
            'sprite' => 'image',
            'chibi_sprite' => 'image',
            'notes' => '',
            'skillname-1' => 'required',
            'skillname-2' => 'required',
            'skillname-3' => 'required',
            'skillpriority-1' => 'required|integer|between:1,3',
            'skillpriority-2' => 'required|integer|between:1,3',
            'skillpriority-3' => 'required|integer|between:1,3',
            'skillimg-1' => 'image',
            'skillimg-2' => 'image',
            'skillimg-3' => 'image',
            'archetype1' => '',
            'archetype2' => '',
            'archetype3' => '',
            'archetype4' => '',
            'archetype5' => '',
            'role1' => '',
            'role2' => '',
            'role3' => '',
            'role4' => '',
            'role5' => '',
            'mob1' => 'integer|between:0,11',
            'mob2' => 'integer|between:0,11',
            'mob3' => 'integer|between:0,11',
            'boss1' => 'integer|between:0,11',
            'boss2' => 'integer|between:0,11',
            'boss3' => 'integer|between:0,11',
            'templates' => '',
        ]);

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                $g = strval($c->id) . '-gear-' . strval($j);
                $s = strval($c->id) . '-category-' . strval($j);
                $gears[$g] = '';
                $gears[$s] = '';
            }
        }

        $rules = array_merge($general, $gears);
        $shipdata = $request->validate($rules);

        $ship = new Ship;
        $ship->name = $shipdata['name'];
        $ship->hull_id = $shipdata['hull'];
        $ship->faction_id = $shipdata['faction'];
        $ship->rarity_id = $shipdata['rarity'];
        $ship->position_id = $shipdata['position'];
        if ($shipdata['notes'] != null) {
            $ship->notes = $shipdata['notes'];
        }

        $this->postImage($request, 'sprite', '/img/ships/sprites/', $ship, 'sprite');
        $this->postImage($request, 'chibi_sprite', '/img/ships/chibi/', $ship, 'chibi_sprite');
        $ship->save();

        for ($i = 1; $i < 6; $i++) {
            if ($shipdata['archetype' . $i] != null) {
                $ship->archetypes()->attach($shipdata['archetype' . $i]);
            } else continue;
        }

        for ($i = 1; $i < 6; $i++) {
            if ($shipdata['role' . $i] != null) {
                $ship->roles()->attach($shipdata['role' . $i]);
            } else continue;
        }

        $mob = new MobScore;
        $mob->ship_id = $ship->id;
        $mob->mob_9_11 = $shipdata['mob1'];
        $mob->mob_12_13 = $shipdata['mob2'];
        $mob->mob_14 = $shipdata['mob3'];
        $mob->save();

        $boss = new BossScore;
        $boss->ship_id = $ship->id;
        $boss->boss_9_11 = $shipdata['boss1'];
        $boss->boss_12_13 = $shipdata['boss2'];
        $boss->boss_14 = $shipdata['boss3'];
        $boss->save();

        $skill = new Skill;
        $skill->ship_id = $ship->id;
        $skill->skill_name = $shipdata['skillname-1'];
        $skill->skill_priority = $shipdata['skillpriority-1'];
        $this->postImage($request, 'skillimg-1', '/img/skills/', $skill, 'skill_img');
        $skill->save();

        $skill2 = new Skill;
        $skill2->ship_id = $ship->id;
        $skill2->skill_name = $shipdata['skillname-2'];
        $skill2->skill_priority = $shipdata['skillpriority-2'];
        $this->postImage($request, 'skillimg-2', '/img/skills/', $skill2, 'skill_img');
        $skill2->save();

        $skill3 = new Skill;
        $skill3->ship_id = $ship->id;
        $skill3->skill_name = $shipdata['skillname-3'];
        $skill3->skill_priority = $shipdata['skillpriority-3'];
        $this->postImage($request, 'skillimg-3', '/img/skills/', $skill3, 'skill_img');
        $skill3->save();

        if(isset($shipdata['templates'])){
            $template = Template::where('id', $shipdata['templates'])->first();
            foreach ($template->gears as $g){
                $temp[$g->id] = ['gear_category' => $g->pivot->gear_category ];
            }
        }


        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                if ($shipdata[strval($c->id) . '-gear-' . strval($j)] != null) {
                    $id = $shipdata[$c->id . '-gear-' . $j];
                    $pivot = 'gear_category';
                    $pivot_data = $shipdata[$c->id . '-category-' . $j] != null ? $shipdata[$c->id . '-category-' . $j] : 'General';
                    $temp[$id] = [$pivot => $pivot_data];
                } else continue;
            }
        }

        $ship->gears()->sync($temp);

        $ship->save();

        return redirect('admin/ships');
    }


    public function editShip($id)
    {
        $cek = array();
        $hulls = Hull::all();
        $rarities = Rarity::all();
        $positions = Position::all();
        $roles = Roles::all();
        $archetypes = Archetype::all();
        $factions = Faction::all();
        $gears = Gear::all();
        $gear_category = GearCategory::all();
        $ship = Ship::where('id', $id)->get();

        foreach ($ship as $s) {
            $selected['hull'] = $s->hull_id;
            $selected['rarity'] = $s->rarity_id;
            $selected['position'] = $s->position_id;

            for ($i = 0; $i < 5; $i++) {
                $selected['archetype' . ($i + 1)] = '';
                $selected['role' . ($i + 1)] = '';
            }

            foreach ($s->archetypes as $key => $a) {
                $selected['archetype' . ($key + 1)] = $a->id;
            }

            foreach ($s->roles as $key => $r) {
                $selected['role' . ($key + 1)] = $r->id;
            }

            $selected['faction'] = $s->faction_id;

            foreach ($gear_category as $c) {
                for ($j = 1; $j < 16; $j++) {
                    $selected[$c->id . '-gear-' . $j] = '';
                    $selected[$c->id . '-category-' . $j] = '';
                }
            }

            foreach ($s->gears as $key => $g) {
                // $this->fillGear(1, $selected, $g->gear_type, $g->id, $g->pivot->gear_category);
                $k = $this->selectSlot(1, $selected, $g->gear_type, '-gear-');
                $c = $this->selectSlot(1, $selected, $g->gear_type, '-category-');

                $selected[$k] = $g->id;
                $selected[$c] = $g->pivot->gear_category;
            }
        }


        return view('admin.ship.edit', compact([
            'ship',
            'selected',
            'hulls',
            'rarities',
            'positions',
            'roles',
            'archetypes',
            'factions',
            'gears',
            'gear_category',
        ]));
    }

    public function updateShip(Request $request)
    {
        $cate = GearCategory::all();
        $general = ([
            'id' => 'required',
            'name' => 'required',
            'hull' => 'required',
            'rarity' => 'required',
            'position' => 'required',
            'faction' => 'required',
            'sprite' => 'image',
            'chibi_sprite' => 'image',
            'notes' => '',
            'skillname-1' => 'required',
            'skillname-2' => 'required',
            'skillname-3' => 'required',
            'skillpriority-1' => 'required|integer|between:1,3',
            'skillpriority-2' => 'required|integer|between:1,3',
            'skillpriority-3' => 'required|integer|between:1,3',
            'skillimg-1' => 'image',
            'skillimg-2' => 'image',
            'skillimg-3' => 'image',
            'archetype1' => '',
            'archetype2' => '',
            'archetype3' => '',
            'archetype4' => '',
            'archetype5' => '',
            'role1' => '',
            'role2' => '',
            'role3' => '',
            'role4' => '',
            'role5' => '',
            'mob1' => 'integer|between:0,11',
            'mob2' => 'integer|between:0,11',
            'mob3' => 'integer|between:0,11',
            'boss1' => 'integer|between:0,11',
            'boss2' => 'integer|between:0,11',
            'boss3' => 'integer|between:0,11',
            'templates' => '',
        ]);

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                $g = strval($c->id) . '-gear-' . strval($j);
                $s = strval($c->id) . '-category-' . strval($j);
                $gears[$g] = '';
                $gears[$s] = '';
            }
        }

        $rules = array_merge($general, $gears);
        $data = $request->validate($rules);
        $ship = Ship::where('id', $data['id'])->first();
        $sprite = $this->updateImg($request, 'sprite', '/img/ships/sprites/', $ship, 'sprite');
        $chibi = $this->updateImg($request, 'chibi_sprite', '/img/ships/chibi/', $ship, 'chibi_sprite');
        $ship->update([
            'name' => $data['name'],
            'hull_id' => $data['hull'],
            'rarity_id' => $data['rarity'],
            'faction_id' => $data['faction'],
            'notes' => $data['notes'],
            'position_id'=> $data['position'],
            'sprite' => $sprite,
            'chibi_sprite' => $chibi,
        ]);

        $ship->mobScore->update([
            'mob_9_11' => $data['mob1'],
            'mob_12_13' => $data['mob2'],
            'mob_14' => $data['mob3'],
        ]);

        $ship->bossScore->update([
            'boss_9_11' => $data['boss1'],
            'boss_12_13' => $data['boss2'],
            'boss_14' => $data['boss3'],
        ]);

        foreach ($ship->skill as $key => $s) {

            $img = $this->updateImg($request, 'skillimg-' . ($key + 1), '/img/skills/', $s, 'skill_img');
            $s->update([
                'skill_name' => $data['skillname-' . ($key + 1)],
                'skill_priority' => $data['skillpriority-' . ($key + 1)],
                'skill_img' => $img,
            ]);
        }

        $temp = array();

        for ($i = 1; $i < 6; $i++) {
            if ($data['archetype' . $i] != null) {
                array_push($temp, $data['archetype' . $i]);
            }
        }

        $ship->archetypes()->sync($temp);
        unset($temp);
        $temp = array();

        for ($i = 1; $i < 6; $i++) {
            if ($data['role' . $i] != null) {
                array_push($temp, $data['role' . $i]);
            }
        }

        $ship->roles()->sync($temp);
        unset($temp);
        $temp = array();

        if(isset($shipdata['templates'])){
            $template = Template::where('id', $shipdata['templates'])->first();
            foreach ($template->gears as $g){
                $temp[$g->id] = ['gear_category' => $g->pivot->gear_category ];
            }
        }

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                if ($data[$c->id . '-gear-' . $j] != null) {
                    $id = $data[$c->id . '-gear-' . $j];
                    $pivot = 'gear_category';
                    $pivot_data = $data[$c->id . '-category-' . $j] != null ? $data[$c->id . '-category-' . $j] : 'General';
                    $temp[$id] = [$pivot => $pivot_data];
                }
            }
        }

        $ship->gears()->sync($temp);

        return redirect('admin/ships');
    }

    public function deleteShip($id)
    {
        $ship = Ship::where('id', '=', $id)->first();
        $ship->archetypes()->detach();
        $ship->roles()->detach();
        $ship->gears()->detach();

        Ship::where('id', '=', $id)->delete();
        Skill::where('ship_id', '=', $id)->delete();
        MobScore::where('ship_id', '=', $id)->delete();
        BossScore::where('ship_id', '=', $id)->delete();

        return redirect('admin/ships');
    }


}
