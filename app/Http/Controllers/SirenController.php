<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siren;
use App\Models\Hull;

class SirenController extends Controller
{
    public function index()
    {
        $sirens = Siren::all();
        // $siren = Siren::find(2)->first();
        // dd($siren->normal);


        return view('siren.index', compact(
            'sirens'
        ));
    }

    public function add()
    {
        return view('admin.siren.add');
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'adaptability' => 'required',
            'weakness' => 'required',
            'img' => 'image',
            'hp' => 'integer',
            'fp' => 'integer',
            'trp' => 'integer',
            'aa' => 'integer',
            'avi' => 'integer',
            'acc' => 'integer',
            'eva' => 'integer',
            'lck' => 'integer',
            'spd' => 'integer',
            'hp-hard' => 'integer',
            'fp-hard' => 'integer',
            'trp-hard' => 'integer',
            'aa-hard' => 'integer',
            'avi-hard' => 'integer',
            'acc-hard' => 'integer',
            'eva-hard' => 'integer',
            'lck-hard' => 'integer',
            'spd-hard' => 'integer',
        ]);

        dd($data);
    }

    public function edit($id)
    {
        $siren = Siren::where('id', $id)->get();
        $hulls = Hull::all();
        foreach ($siren as $s) {
            $selected['type'] = $s->boss_type;
            $selected['difficulty'] = $s->difficulty;
            $selected['adaptability'] = $s->adaptability;
            $selected['hull'] = $s->hull_id;
            $selected['armor'] = $s->armor;
        }

        return view('admin.siren.edit', compact('siren', 'hulls', 'selected'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => '',
            'hull' => '',
            'level' => 'integer',
            'armor' => '',
            'hp' => 'integer',
            'fp' => 'integer',
            'trp' => 'integer',
            'aa' => 'integer',
            'avi' => 'integer',
            'acc' => 'integer',
            'eva' => 'integer',
            'lck' => 'integer',
            'spd' => 'integer',
            'weakness' => '',
            'img' => 'image',
        ]);

        $siren = Siren::where('id', $data['id']);
        $siren->update([
            'name' => $data['name'],
            'hull_id' => $data['hull'],
            'level' => $data['level'],
            'armor' => $data['armor'],
            'hp' => $data['hp'],
            'fp' => $data['fp'],
            'trp' => $data['trp'],
            'aa' => $data['aa'],
            'avi' => $data['avi'],
            'acc' => $data['acc'],
            'eva' => $data['eva'],
            'lck' => $data['lck'],
            'spd' => $data['spd'],
            'weakness' => $data['weakness'],
        ]);

        if (array_key_exists('img', $data)) {
            $siren->update([
                'img' => $request->file('img')->store('siren/img'),
            ]);
        }

        return redirect('admin/sirens');
    }
}
