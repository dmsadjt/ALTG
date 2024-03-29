<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rarity;
use App\Models\Gear;
use App\Models\GearCategory;
use Illuminate\Support\Facades\Storage;

class GearController extends Controller
{
    public function addGear()
    {
        $rarity = Rarity::all();
        $category = GearCategory::all();

        return view('admin.gear.add', compact('rarity', 'category'));
    }

    public function postGear(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required|integer',
            'rarity' => 'required|string',
            'img' => 'required|image',
        ]);

        $gear = new Gear;
        $gear['gear_name'] = $data['name'];
        $gear['gear_type'] = $data['type'];
        $gear['gear_rarity'] = $data['rarity'];
        $gear['gear_img'] = $request->file('img')->store('gear/img');
        $gear->save();

        return redirect('admin/gears');
    }

    public function editGear($id)
    {
        $gear = Gear::where('id', $id)->get();
        $rarity = Rarity::all();
        $category = GearCategory::all();

        foreach ($gear as $g) {
            $selected['rarity'] = $g->gear_rarity;
            $selected['type'] = $g->gear_type;
        }

        return view('admin.gear.edit', compact(['gear', 'rarity', 'category', 'selected']));
    }

    public function updateGear(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => '',
            'type' => 'integer',
            'rarity' => 'string',
            'img' => 'image',
        ]);

        $gear = Gear::where('id', $data['id'])->first();
        $gear->update([
            'gear_name' => $data['name'],
            'gear_type' => $data['type'],
            'gear_rarity' => $data['rarity'],
        ]);

        if (array_key_exists('img', $data)) {
            if ($gear->gear_img != 'gear/img/no-pictures.png') {
                Storage::delete($gear->gear_img);
            }
            $img = $request->file('img')->store('gear/img');
            $gear->update([
                'gear_img' => $img,
            ]);
        }

        return redirect('admin/gears');
    }

    public function deleteGear($id)
    {
        $gear = Gear::where('id', $id)->first();
        $gear->templates()->detach();
        if ($gear->gear_img && $gear->gear_img != 'gear/img/no-pictures.png') {
            Storage::delete($gear->gear_img);
        }

        $gear->delete();

        return redirect('admin/gears');
    }
}
