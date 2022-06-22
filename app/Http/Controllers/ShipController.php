<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ship;
class ShipController extends Controller
{
    public function index(){
        $ships=Ship::get();
        return view('ships.index', compact('ships'));
    }

    public function get(){
        return view('ships.view');
    }
}
