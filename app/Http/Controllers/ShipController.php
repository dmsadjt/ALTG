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
use Illuminate\Support\Facades\Storage;

class ShipController extends Controller
{
    public function index()
    {
        return view('ships.index');
    }

    public function get($id)
    {
        if (Ship::find($id)) {
            $ship = Ship::where('id', '=', $id)->with(['mobScore', 'bossScore', 'archetypes', 'roles', 'positions', 'skill', 'general', 'light', 'medium', 'heavy'])->first();
        } else return view('dump');
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

        if ($request->filled('role')) {
            $ship->with(['roles'])->whereHas('roles', function ($q) use ($roles) {
                $q->whereIn('role_name', $roles);
            });
        }

        if ($request->filled('position')) {

            if ($request['position'] == 'tank')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-tank')->orWhere('position_slug', 'vanguard-tank-mid')->orWhere('position_slug', 'vanguard-tank-off_tank');
                });

            if ($request['position'] == 'offtank')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug', 'vanguard-offtank')->orWhere('position_slug', 'vanguard-tank-off_tank');
                });

            if ($request['position'] == 'mid')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'vanguard-mid-offtank')->orWhere('position_slug', 'vanguard-tank-mid')->orWhere('position_slug', 'vanguard-mid');
                });

            if ($request['position'] == 'flagship')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-flagship')->orWhere('position_slug', 'submarine-flagship');
                });

            if ($request['position'] == 'offflag')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-off_flag')->orWhere('position_slug', 'submarine-off_flag');
                });

            if ($request['position'] == 'any')
                $ship->with(['positions'])->whereHas('positions', function ($q) {
                    $q->where('position_slug', 'backline-any')->orWhere('position_slug', 'submarine-all')->orWhere('position_slug', 'vanguard-any');
                });
        }

        if ($request->filled('rarity')) {
            $ship->with(['rarity'])->whereHas('rarity', function ($q) use ($request) {
                $q->whereIn('rarity_slug', $request->rarity);
            });
        }

        if ($request->filled('faction')) {
            $ship->with(['faction'])->whereHas('faction', function ($q) use ($request) {
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
        $selectedHull = Hull::where('id', $request['hull']);
        $role = Roles::all();
        $roles = array();
        foreach ($role as $r) {
            array_push($roles, $r->role_name);
        }

        return view('ships.index', compact('ships', 'hulls', 'rarity', 'factions', 'positions', 'roles', 'selected', 'selectedHull'));
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
        $templates = Template::all();
        $gear_category = GearCategory::all();
        $gears = Gear::all();

        return view('admin.ship.add', compact(
            'hulls',
            'rarities',
            'positions',
            'roles',
            'archetypes',
            'factions',
            'templates',
            'gear_category',
            'gears',
        ));
    }

    public function postShip(Request $request)
    {
        // dd($request);
        $cate = GearCategory::all();
        $rules = ([
            'name' => 'required',
            'hull' => 'required',
            'rarity' => 'required',
            'position' => 'required',
            'faction' => 'required',
            'sprite' => 'image',
            'chibi_sprite' => 'image',
            'notes' => '',
            'skillname-1' => 'required',
            'skillname-2' => '',
            'skillname-3' => '',
            'skillpriority-1' => 'required|integer|between:1,3',
            'skillpriority-2' => 'nullable|integer|between:1,3',
            'skillpriority-3' => 'nullable|integer|between:1,3',
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
            'mob4' => 'integer|between:0,11',
            'boss1' => 'integer|between:0,11',
            'boss2' => 'integer|between:0,11',
            'boss3' => 'integer|between:0,11',
            'boss4' => 'integer|between:0,11',
            'template-general' => '',
            'template-light' => '',
            'template-heavy' => '',
            'template-medium' => '',
        ]);

        try {
            $shipdata = $request->validate($rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // This will display the validation errors in detail
        }

        $ship = new Ship;
        $ship->name = $shipdata['name'];
        $ship->hull_id = $shipdata['hull'];
        $ship->faction_id = $shipdata['faction'];
        $ship->rarity_id = $shipdata['rarity'];
        $ship->position_id = $shipdata['position'];

        if (isset($shipdata['template-general'])) {
            $ship->general_id = $shipdata['template-general'];
        }

        if (isset($shipdata['template-light'])) {
            $ship->light_id = $shipdata['template-light'];
        }

        if (isset($shipdata['template-medium'])) {
            $ship->medium_id = $shipdata['template-medium'];
        }

        if (isset($shipdata['template-heavy'])) {
            $ship->heavy_id = $shipdata['template-heavy'];
        }


        if ($shipdata['notes'] != null) {
            $ship->notes = $shipdata['notes'];
        }

        if (isset($shipdata['sprite'])) {
            $ship['sprite'] = $request->file('sprite')->store('ships/img/sprite');
        } else {
            $ship['sprite'] = 'ships/img/sprite/no-sprite.png';
        }

        if (isset($shipdata['chibi_sprite'])) {
            $ship['chibi_sprite'] = $request->file('chibi_sprite')->store('ships/img/chibi');
        } else {
            $ship['chibi_sprite'] = 'ships/img/chibi/no-sprite.png';
        }

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
        $mob->mob_15 = $shipdata['mob4'];
        $mob->save();

        $boss = new BossScore;
        $boss->ship_id = $ship->id;
        $boss->boss_9_11 = $shipdata['boss1'];
        $boss->boss_12_13 = $shipdata['boss2'];
        $boss->boss_14 = $shipdata['boss3'];
        $boss->boss_15 = $shipdata['boss4'];
        $boss->save();

        $skill = new Skill;
        $skill->ship_id = $ship->id;
        $skill->skill_name = $shipdata['skillname-1'];
        $skill->skill_priority = $shipdata['skillpriority-1'];
        if ((isset($shipdata['skillimg-1']))) {
            $skill->skill_img = $request->file('skillimg-1')->store('skill/img');
        } else {
            $skill->skill_img = 'skill/img/no-skill-pictures.png';
        }
        $skill->save();

        if ($shipdata['skillname-2'] != null) {
            $skill2 = new Skill;
            $skill2->ship_id = $ship->id;
            $skill2->skill_name = $shipdata['skillname-2'];
            $skill2->skill_priority = $shipdata['skillpriority-2'];
            if ((isset($shipdata['skillimg-2']))) {
                $skill2->skill_img = $request->file('skillimg-2')->store('skill/img');
            } else {
                $skill2->skill_img = 'skill/img/no-skill-pictures.png';
            }
            $skill2->save();
        }

        if ($shipdata['skillname-3'] != null) {
            $skill3 = new Skill;
            $skill3->ship_id = $ship->id;
            $skill3->skill_name = $shipdata['skillname-3'];
            $skill3->skill_priority = $shipdata['skillpriority-3'];
            if ((isset($shipdata['skillimg-3']))) {
                $skill3->skill_img = $request->file('skillimg-3')->store('skill/img');
            } else {
                $skill3->skill_img = 'skill/img/no-skill-pictures.png';
            }
            $skill3->save();
        }

        $ship->save();

        return redirect('admin/ships');
    }


    public function editShip($id)
    {
        if (!Ship::find($id)) {
            return view('dump');
        }
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
        $templates = Template::all();

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
            $selected['build'] = $s->template ? $s->template->build : '';
            $selected['general'] = $s->general_id;
            $selected['light'] = $s->light_id;
            $selected['medium'] = $s->medium_id;
            $selected['heavy'] = $s->heavy_id;
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
            'templates',
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
            'skillname-2' => '',
            'skillname-3' => '',
            'skillpriority-1' => 'required|integer|between:1,3',
            'skillpriority-2' => 'nullable|integer|between:1,3',
            'skillpriority-3' => 'nullable|integer|between:1,3',
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
            'template-general' => '',
            'template-light' => '',
            'template-heavy' => '',
            'template-medium' => '',
        ]);

        $data = $request->validate($general);

        $ship = Ship::where('id', $data['id'])->first();

        if (isset($data['sprite'])) {
            if ($ship->sprite != 'ships/img/sprite/no-sprite.png') {
                Storage::delete($ship->sprite);
            }
            $ship['sprite'] = $request->file('sprite')->store('ships/img/sprite');
        }
        if (isset($data['chibi_sprite'])) {
            if ($ship->chibi_sprite != 'ships/img/chibi/no-sprite.png') {
                Storage::delete($ship->chibi_sprite);
            }
            $ship['chibi_sprite'] = $request->file('chibi_sprite')->store('ships/img/chibi');
        }
        $ship->update([
            'name' => $data['name'],
            'hull_id' => $data['hull'],
            'rarity_id' => $data['rarity'],
            'faction_id' => $data['faction'],
            'notes' => $data['notes'],
            'position_id' => $data['position'],
            'general_id' => $data['template-general'],
            'light_id' => $data['template-light'],
            'medium_id' => $data['template-medium'],
            'heavy_id' => $data['template-heavy'],
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

        for ($i = 0; $i < 3; $i++) {
            if (isset($data['skillname-' . ($i + 1)])) {
                if (isset($ship->skill[$i])) {
                    $ship->skill[$i]->update([
                        'skill_name' => $data['skillname-' . ($i + 1)],
                        'skill_priority' => $data['skillpriority-' . ($i + 1)],
                    ]);
                    if ((isset($data['skillimg-' . ($i  + 1)]))) {
                        if ($ship->skill[$i]->skill_img != 'skill/img/no-skill-pictures.png') {
                            Storage::delete($ship->skill[$i]->skill_img);
                        }
                        $ship->skill[$i]->update([
                            'skill_img' => $request->file('skillimg-' . ($i + 1))->store('skill/img'),
                        ]);
                    }
                } else {
                    ${'skill' . $i} = new Skill();
                    ${'skill' . $i}['ship_id'] = $data['id'];
                    ${'skill' . $i}['skill_name'] = $data['skillname-' . ($i + 1)];
                    ${'skill' . $i}['skill_priority'] = $data['skillpriority-' . ($i + 1)];
                    if ((isset($data['skillimg-' . $i]))) {
                        ${'skill' . $i}['skill_img'] = $request->file('skillimg-' . $i)->store('skill/img');
                    } else {
                        ${'skill' . $i}['skill_img'] = 'skill/img/no-skill-pictures.png';
                    }
                    ${'skill' . $i}->save();
                }
            } elseif (!isset($data['skillname-' . ($i + 1)])) {
                if (isset($ship->skill[$i])) {
                    $id = $ship->skill[$i]->id;
                    // dd(Skill::where('id', $id)->first());
                    Skill::where('id', $id)->delete();
                }
            }
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

        if (isset($shipdata['templates'])) {
            $template = Template::where('id', $shipdata['templates'])->first();
            foreach ($template->gears as $g) {
                $temp[$g->id] = ['gear_category' => $g->pivot->gear_category];
            }
        }

        return redirect('admin/ships');
    }

    public function deleteShip($id)
    {
        $ship = Ship::where('id', '=', $id)->first();
        $ship->archetypes()->detach();
        $ship->roles()->detach();

        if ($ship->sprite) {
            Storage::delete($ship->sprite);
        }

        if ($ship->chibi_sprite) {
            Storage::delete($ship->chibi_sprite);
        }

        Ship::where('id', '=', $id)->delete();
        $skil = Skill::where('ship_id', '=', $id)->get();

        foreach ($skil as $s) {
            if ($s->skill_img) {
                Storage::delete($s->skill_img);
            }
            $s->delete();
        }

        MobScore::where('ship_id', '=', $id)->delete();
        BossScore::where('ship_id', '=', $id)->delete();

        return redirect('admin/ships');
    }
}
