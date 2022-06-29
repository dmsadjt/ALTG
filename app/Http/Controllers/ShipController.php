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

    public function get($id){

        $ship = Ship::where('id','=', $id)->first();
        $temp = $ship->skill->sortBy('skill_priority');
        $skill = array();
        foreach ($temp as $t){
            array_push($skill, $t);
        }

        return view('ships.view', compact('ship','skill'));
    }
}
