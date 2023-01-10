<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faction;
use Illuminate\Support\Facades\Storage;

class FactionController extends Controller
{

    public function addFaction()
    {
        return view('admin.faction.add');
    }

    public function postFaction(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'tag' => 'required',
            'slug' => 'required',
            'img' => 'required|image',
        ]);

        $faction = new Faction;
        $faction['faction_name'] = $data['name'];
        $faction['faction_tag'] = $data['tag'];
        $faction['faction_slug'] = $data['slug'];
        $faction['faction_img'] = $request->file('img')->store('factions/img');
        $faction->save();

        return redirect('admin/factions');
    }

    public function editFaction($id)
    {
        $faction = Faction::where('id', '=', $id)->get();

        return view('admin.faction.edit', compact('faction'));
    }

    public function updateFaction(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'tag' => 'required',
            'slug' => '',
            'img' => 'image',
        ]);

        $faction = Faction::where('id', '=', $data['id'])->first();
        $img = $faction->faction_img;

        if ($request->file('img')) {
            Storage::delete($faction->faction_img);
            $img = $request->file('img')->store('factions/img');
        }

        $faction->update([
            'faction_name' => $data['name'],
            'faction_tag' => $data['tag'],
            'faction_img' => $img,
        ]);

        return redirect('admin/factions');
    }


    public function deleteFaction($id)
    {

        $faction = Faction::where('id', '=', $id)->first();
        $temp = array();
        foreach ($faction->ship as $s) {
            $s->update([
                'faction_id' => '1',
            ]);
        }

        if ($faction->faction_img) {
            Storage::delete($faction->faction_img);
        }

        $faction->delete();

        return redirect('admin/factions');
    }
}
