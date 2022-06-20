<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(){
        return view('tierlist-section');
    }

    public function get(){
        return view('ship-section');
    }
}
