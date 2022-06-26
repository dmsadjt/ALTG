<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siren;

class SirenController extends Controller
{
    public function index()
    {
        $stronghold_none = Siren::where('boss_type', '=', 'stronghold')->where('adaptability', '=', 'none')->get();
        $stronghold_full = Siren::where('boss_type', '=', 'stronghold')->where('adaptability', '=', 'full')->get();

        $abyssal_none = Siren::where('boss_type', '=', 'abyssal')->where('adaptability', '=', 'none')->get();
        $abyssal_full = Siren::where('boss_type', '=', 'abyssal')->where('adaptability', '=', 'full')->get();

        $arbiter_none_normal = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'none')->where('difficulty', '=', 'normal')->get();
        $arbiter_none_hard = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'none')->where('difficulty', '=', 'hard')->get();
        $arbiter_full_normal = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'full')->where('difficulty', '=', 'normal')->get();
        $arbiter_full_hard = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'full')->where('difficulty', '=', 'hard')->get();

        $guild = Siren::where('boss_type', '=', 'guild')->get();
        $meta = Siren::where('boss_type', '=', 'meta')->get();



        return view('siren.index', compact(
            'stronghold_none', 'stronghold_full', 'abyssal_none', 'abyssal_full', 'arbiter_none_normal',
            'arbiter_none_hard', 'arbiter_full_normal', 'arbiter_full_hard', 'guild', 'meta'));
    }
}
