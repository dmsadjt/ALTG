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
use App\Models\Template;
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
        $totalTemplates = Template::count();

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
            'totalTemplates',
        ));
    }

    public function ships()
    {
        $ships = Ship::with(['hull', 'faction', 'positions', 'archetypes', 'skill', 'mobScore', 'bossScore', 'rarity', 'roles', 'general', 'light', 'medium', 'heavy'])->paginate(10);
        $ship = Ship::first();


        return view('admin.ship.index', compact('ships'));
    }


    public function sirens()
    {
        $siren = Siren::with('normal', 'hard')->paginate(10);

        return view('admin.siren.index', compact('siren'));
    }

    public function posts()
    {
        $post = Post::with(['tags', 'images'])->paginate(10);

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
        $roles = Roles::with('factions')->paginate(10);

        return view('admin.role.index', compact('roles'));
    }

    public function positions()
    {
        $positions = Position::with('children')->paginate(10);

        return view('admin.position.index', compact('positions'));
    }

    public function gears()
    {
        $gears = Gear::paginate(10);

        return view('admin.gear.index', compact('gears'));
    }

    public function hulls()
    {
        $hulls = Hull::with('subs')->paginate(10);

        return view('admin.hull.index', compact('hulls'));
    }
}
