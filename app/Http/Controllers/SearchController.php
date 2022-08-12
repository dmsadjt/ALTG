<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){

        return view('search.index');
    }

    public function search(Request $request, Ship $ship){
        $ship = $ship->newQuery();
        $result = $request->ship;

        if($request->filled('ship')){
            $ship->where('name','LIKE', "%{$result}%");
        }

        $ships = $ship->sortable()->paginate(10);


        return view('search.result', compact('ships','result'));
    }
}
