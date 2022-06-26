<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index(){
        $ships = Ship::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id','desc')->get();
        $average_mob = array();

        return view('landing-page', compact('ships', 'posts'));
    }
}
