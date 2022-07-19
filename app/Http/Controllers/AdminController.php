<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Ship;
use App\Models\Siren;
use App\Models\Post;
use App\Models\Faction;
use App\Models\Archetype;
use App\Models\BossScore;
use App\Models\Roles;
use App\Models\Position;
use App\Models\Gear;
use App\Models\GearCategory;
use App\Models\Hull;
use App\Models\MobScore;
use App\Models\Rarity;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dateTime = Carbon::now();
        $totalShips = Ship::count();
        $totalSirens = Siren::count();
        $totalPosts = Post::count();
        $totalFactions = Faction::count();
        $totalArchetypes = Archetype::count();
        $totalRoles = Roles::count();
        $totalPositions = Position::count();
        $totalGears = Gear::count();
        $totalHulls = Hull::count();

        return view('admin.dashboard', compact(
            'user',
            'dateTime',
            'totalShips',
            'totalSirens',
            'totalPosts',
            'totalFactions',
            'totalArchetypes',
            'totalPositions',
            'totalRoles',
            'totalGears',
            'totalHulls',
        ));
    }

    //Ships
    public function ships()
    {
        $ships = Ship::paginate(10);

        return view('admin.ship.index', compact('ships'));
    }

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

        return view('admin.ship.add', compact(
            'hulls',
            'rarities',
            'positions',
            'roles',
            'archetypes',
            'factions',
            'gears',
            'gear_category',
        ));
    }


    //function for posting images
    function postImage($req, $filename, $path, $input, $input_column)
    {
        if ($file = $req->file($filename)) {
            $dest = public_path($path);
            $name = $req->file($filename)->getClientOriginalName();
            $extension = $req->file($filename)->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            $input->$input_column = $storename;
        }
    }

    //function for updating images
    function updateImg($req, $filename, $path, $input, $input_column)
    {
        if ($file = $req->file($filename)) {
            $dest = public_path($path);
            $name = $req->file($filename)->getClientOriginalName();
            $extension = $req->file($filename)->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            return $storename;
        } else {
            return $input->$input_column;
        }
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
        if ($shipdata['notes'] != null) {
            $ship->notes = $shipdata['notes'];
        }

        $this->postImage($request, 'sprite', '/img/ships/sprites/', $ship, 'sprite');
        $this->postImage($request, 'chibi_sprite', '/img/ships/chibi/', $ship, 'chibi_sprite');
        $ship->save();

        if ($shipdata['position'] != null) {
            $ship->positions()->attach($shipdata['position']);
        }

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

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                if ($shipdata[strval($c->id) . '-gear-' . strval($j)] != null) {
                    $info = $shipdata[strval($c->id) . '-gear-' . strval($j)];
                    $data = $shipdata[strval($c->id) . '-category-' . strval($j)] != null ? $shipdata[strval($c->id) . '-category-' . strval($j)] : 'General';
                    $ship->gears()->attach($info, ['gear_category' => $data]);
                } else continue;
            }
        }
        $ship->save();

        return redirect('admin/ships');
    }

    function selectSlot($counter, $select, $type, $arr)
    {
        if ($select[$type . $arr . $counter] != '') {
            $counter++;
            return $this->selectSlot($counter, $select, $type, $arr);
        } else {
            $ret = $type . $arr . $counter;
            return $ret;
        }
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
            foreach ($s->positions as $p) {
                $selected['position'] = $p->id;
            }

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

        $ship->positions()->sync([$data['position']]);
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
        $ship->positions()->detach();
        $ship->roles()->detach();
        $ship->gears()->detach();

        Ship::where('id', '=', $id)->delete();
        Skill::where('ship_id', '=', $id)->delete();
        MobScore::where('ship_id', '=', $id)->delete();
        BossScore::where('ship_id', '=', $id)->delete();

        return redirect('admin/ships');
    }
    //Ships

    //Factions
    public function deleteFaction($id){

        $faction = Faction::where('id','=',$id)->first();
        $temp = array();
        foreach ($faction->ship as $s){
            $s->update([
                'faction_id'=>'1',
            ]);
        }

        $faction->delete();

        return redirect('admin/factions');
    }

    //Factions

    //Hulls
    public function deleteHull($id){

        $hull = Hull::where('id','=',$id)->first();

        foreach ($hull->ship as $s){
            $s->update([
                'hull_id'=>'1',
            ]);
        }

        $hull->delete();

        return redirect('admin/hulls');
    }
    //Hulls

    //Roles
    public function deleteRole($id){
        $role = Roles::where('id','=',$id)->first();
        $role->ships()->detach();
        $role->delete();

        return redirect('admin/roles');

    }
    //Roles

    //Archetype
    public function deleteArchetype($id){
        $arche = Archetype::where('id','=',$id)->first();
        $arche->ships()->detach();
        $arche->delete();

        return redirect('admin/archetypes');

    }
    //Archetype

    public function sirens()
    {
        $siren = Siren::paginate(10);

        return view('admin.siren.index', compact('siren'));
    }

    public function posts()
    {
        $post = Post::paginate(10);

        return view('admin.post.index', compact('post'));
    }

    public function factions()
    {
        $factions = Faction::paginate(10);

        return view('admin.faction.index', compact('factions'));
    }

    public function archetypes()
    {
        $archetypes = Archetype::paginate(10);

        return view('admin.archetype.index', compact('archetypes'));
    }

    public function roles()
    {
        $roles = Roles::paginate(10);

        return view('admin.role.index', compact('roles'));
    }

    public function positions()
    {
        $positions = Position::paginate(10);

        return view('admin.position.index', compact('positions'));
    }

    public function gears()
    {
        $gears = Gear::paginate(10);

        return view('admin.gear.index', compact('gears'));
    }

    public function hulls()
    {
        $hulls = Hull::paginate(10);

        return view('admin.hull.index', compact('hulls'));
    }
}
