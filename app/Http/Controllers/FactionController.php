<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faction;

class FactionController extends Controller
{

    public function addFaction(){
        return view('admin.faction.add');
    }

    public function postFaction(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'tag'=>'required',
            'slug'=>'required',
            'img'=>'required|image',
        ]);

        $faction = new Faction;
        $faction['faction_name'] = $data['name'];
        $faction['faction_tag'] = $data['tag'];
        $faction['faction_slug'] = $data['slug'];
        $faction['faction_img'] = $this->postImageRet($request, 'img', '/img/faction-logo/');
        $faction->save();

        return redirect('admin/factions');

    }

    public function editFaction($id){
        $faction = Faction::where('id','=',$id)->get();

        return view('admin.faction.edit', compact('faction'));
    }

    public function updateFaction(Request $request){
        $data = $request->validate([
            'id'=>'required',
            'name'=>'required',
            'tag'=>'required',
            'slug'=>'',
            'img'=>'image',
        ]);

        $faction = Faction::where('id','=', $data['id'])->first();
        $img = array_key_exists('img', $data) ? $this->updateImg($request, 'img', '/img/faction-logo/',$faction, 'faction_img') : $faction->faction_img;

        $faction->update([
            'faction_name'=>$data['name'],
            'faction_tag'=>$data['tag'],
            'faction_img'=>$img,
        ]);

        return redirect('admin/factions');
    }


    public function deleteFaction($id){

        $faction = Faction::where('id','=',$id)->first();
        $temp = array();
        foreach ($faction->ship as $s){
            $s->update([
                'faction_id'=>'1',
            ]);
        }

        $faction->delete();

        return redirect('admin/factions');
    }

}
