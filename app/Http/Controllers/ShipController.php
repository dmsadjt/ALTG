<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index(){
        return view('ships.index');
    }

    public function get(){
        return view('ships.view');
    }
}
