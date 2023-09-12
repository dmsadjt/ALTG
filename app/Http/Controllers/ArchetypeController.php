<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archetype;

class ArchetypeController extends Controller
{
    public function addArchetype()
    {
        return view('admin.archetype.add');
    }

    public function postArchetype(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Archetype::create([
            'archetype_name' => $data['name'],
        ]);

        return redirect('admin/archetypes');
    }

    public function editArchetype($id)
    {
        $archetype = Archetype::where('id', '=', $id)->get();

        return view('admin.archetype.edit', compact('archetype'));
    }

    public function updateArchetype(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);


        $archetype = Archetype::where('id', '=', $data['id'])->first();
        $archetype->archetype_slug = null;
        $archetype->update([
            'archetype_name' => $data['name'],
        ]);

        return redirect('admin/archetypes');
    }



    public function deleteArchetype($id)
    {
        $arche = Archetype::where('id', '=', $id)->first();
        $arche->ships()->detach();
        $arche->delete();

        return redirect('admin/archetypes');
    }
}
