<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Faction;

class RoleController extends Controller
{
    public function addRole()
    {
        $faction = Faction::all();
        return view('admin.role.add', compact('faction'));
    }

    public function postRole(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'faction-1' => '',
            'faction-2' => '',
            'faction-3' => '',
        ]);


        $role = Roles::create([
            'role_name' => $data['name'],
        ]);

        for ($i = 1; $i < 4; $i++) {
            if ($data['faction-' . $i] != null) {
                $role->factions()->attach($data['faction-' . $i]);
            }
        }

        $role->save();

        return redirect('admin/roles');
    }

    public function editrole($id)
    {
        $role = Roles::where('id', '=', $id)->get();
        $role2 = Roles::where('id', '=', $id)->first();
        $faction = Faction::all();

        for ($i = 0; $i < 4; $i++) {
            $selected['role-' . $i] = '';
        }


        foreach ($role2->factions as $key => $f) {
            $selected['role-' . ($key + 1)] = $f->id;
        }


        return view('admin.role.edit', compact('role', 'selected', 'faction'));
    }

    public function updateRole(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'slug' => '',
            'faction-1' => '',
            'faction-2' => '',
            'faction-3' => '',
        ]);


        $role = Roles::where('id', '=', $data['id'])->first();
        $role->role_slug = null;
        $role->update([
            'role_name' => $data['name'],
        ]);

        $temp = array();
        for ($i = 1; $i < 4; $i++) {
            if ($data['faction-' . $i] != null) {
                array_push($temp, $data['faction-' . $i]);
            }
        }

        $role->factions()->sync($temp);

        return redirect('admin/roles');
    }

    public function deleteRole($id)
    {
        $role = Roles::where('id', '=', $id)->first();
        $role->ships()->detach();
        $role->factions()->detach();
        $role->delete();

        return redirect('admin/roles');
    }
}
