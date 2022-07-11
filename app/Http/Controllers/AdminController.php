<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Ship;
use App\Models\Siren;
use App\Models\Post;
use App\Models\Faction;
use App\Models\Archetype;
use App\Models\Roles;
use App\Models\Position;
use App\Models\Gear;
use App\Models\Hull;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

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
}
