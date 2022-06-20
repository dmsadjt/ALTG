<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SirenController extends Controller
{
    public function index(){
        return view('siren.index');
    }
}
