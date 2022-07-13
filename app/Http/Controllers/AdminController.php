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
            'skillimg' => 'image',
            'skillimg' => 'image',
            'skillimg' => 'image',
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
            for ($j = 0; $j < 15; $j++) {
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

        if ($file = $request->file('sprite')) {
            $dest = public_path('/img/ships/sprites/');

            $name = $request->file('sprite')->getClientOriginalName();
            $extension = $request->file('sprite')->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            $ship->sprite = $storename;
        }

        if ($file = $request->file('chibi_sprite')) {
            $dest = public_path('/img/ships/chibi/');

            $name = $request->file('chibi_sprite')->getClientOriginalName();
            $extension = $request->file('chibi_sprite')->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            $ship->chibi_sprite = $storename;
        }

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
        if ($file = $request->file('skillimg-1')) {
            $dest = public_path('/img/skills/');

            $name = $request->file('skillimg-1')->getClientOriginalName();
            $extension = $request->file('skillimg-1')->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            $skill->skill_img = $storename;
        }
        $skill->save();

        $skill2 = new Skill;
        $skill2->ship_id = $ship->id;
        $skill2->skill_name = $shipdata['skillname-2'];
        $skill2->skill_priority = $shipdata['skillpriority-2'];
        if ($file = $request->file('skillimg-2')) {
            $dest = public_path('/img/skills/');

            $name = $request->file('skillimg-2')->getClientOriginalName();
            $extension = $request->file('skillimg-2')->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            $skill2->skill_img = $storename;
        }
        $skill2->save();

        $skill3 = new Skill;
        $skill3->ship_id = $ship->id;
        $skill3->skill_name = $shipdata['skillname-3'];
        $skill3->skill_priority = $shipdata['skillpriority-3'];
        if ($file = $request->file('skillimg-3')) {
            $dest = public_path('/img/skills/');

            $name = $request->file('skillimg-3')->getClientOriginalName();
            $extension = $request->file('skillimg-3')->getClientOriginalExtension();
            $nameonly = pathinfo($name, PATHINFO_FILENAME);
            $storename = $nameonly . '_' . time() . '.' . $extension;
            $file->move($dest, $storename);
            $skill3->skill_img = $storename;
        }
        $skill3->save();

        foreach ($cate as $c) {
            for ($j = 0; $j < 15; $j++) {
                if (strval($c->id) . '-gear-' . strval($j) != null) {
                    if (strval($c->id) . '-category-' . strval($j) != null) {
                        $ship->gears()->attach($shipdata[strval($c->id) . '-gear-' . strval($j)], ['gear_category' => $shipdata[strval($c->id) . '-category-' . strval($j)]]);
                    } else if (strval($c->id) . '-category-' . strval($j) == null) {
                        $ship->gears()->attach($shipdata[strval($c->id) . '-gear-' . strval($j)], ['gear_category' => 'General']);
                    }
                } else continue;
            }
        }


        $ship->save();

        return redirect('admin/ships');
    }


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
