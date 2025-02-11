<?php

namespace App\Http\Controllers;

use App\Models\FullHard;
use App\Models\FullNormal;
use Illuminate\Http\Request;
use App\Models\Siren;
use App\Models\Hull;
use App\Models\Normal;
use App\Models\Hard;
use Illuminate\Support\Facades\Storage;

class SirenController extends Controller
{
    public function index()
    {
        $sirens = Siren::all();
        // $siren = Siren::find(2)->first();
        // dd($siren->normal);

        // dd($sirens);
        return view('siren.index', compact(
            'sirens'
        ));
    }

    public function add()
    {
        return view('admin.siren.add');
    }

    public function delete($id)
    {
        $boss = Siren::where('id', $id)->first();
        Normal::where('siren_id', $id)->delete();
        Hard::where('siren_id', $id)->delete();
        FullNormal::where('siren_id', $id)->delete();
        FullHard::where('siren_id', $id)->delete();

        if ($boss->img) {
            Storage::delete($boss->img);
        }

        $boss->delete();

        return redirect('admin/sirens');
    }

    public function post(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'weakness' => 'required',
            'img' => 'image',
            'armor' => 'required',
            'hull' => 'required',
            'level' => 'integer',
            'hp' => 'integer',
            'fp' => 'integer',
            'trp' => 'integer',
            'aa' => 'integer',
            'avi' => 'integer',
            'acc' => 'integer',
            'eva' => 'integer',
            'lck' => 'integer',
            'spd' => 'integer',
            'armor-hard' => '',
            'hull-hard' => '',
            'level-hard' => 'integer',
            'hp-hard' => 'integer',
            'fp-hard' => 'integer',
            'trp-hard' => 'integer',
            'aa-hard' => 'integer',
            'avi-hard' => 'integer',
            'acc-hard' => 'integer',
            'eva-hard' => 'integer',
            'lck-hard' => 'integer',
            'spd-hard' => 'integer',
            'full-armor' => '',
            'full-hull' => '',
            'full-level' => 'integer',
            'full-hp' => 'integer',
            'full-fp' => 'integer',
            'full-trp' => 'integer',
            'full-aa' => 'integer',
            'full-avi' => 'integer',
            'full-acc' => 'integer',
            'full-eva' => 'integer',
            'full-lck' => 'integer',
            'full-spd' => 'integer',
            'full-armor-hard' => '',
            'full-hull-hard' => '',
            'full-level-hard' => 'integer',
            'full-hp-hard' => 'integer',
            'full-fp-hard' => 'integer',
            'full-trp-hard' => 'integer',
            'full-aa-hard' => 'integer',
            'full-avi-hard' => 'integer',
            'full-acc-hard' => 'integer',
            'full-eva-hard' => 'integer',
            'full-lck-hard' => 'integer',
            'full-spd-hard' => 'integer',
        ]);

        $boss = Siren::create([
            'name' => $data['name'],
            'boss_type' => $data['type'],
            'weakness' => $data['weakness'],
            'img' => $request->file('img')->store('siren/img'),
        ]);

        $boss->normal()->create([
            'armor' => $data['armor'],
            'hull_id' => $data['hull'],
            'level' => $data['level'],
            'hp' => $data['hp'],
            'fp' => $data['fp'],
            'trp' => $data['trp'],
            'aa' => $data['aa'],
            'avi' => $data['avi'],
            'acc' => $data['acc'],
            'eva' => $data['eva'],
            'lck' => $data['lck'],
            'spd' => $data['spd'],
        ]);


        if (isset($data['hp-hard'])) {
            $boss->hard()->create([
                'armor' => $data['armor-hard'],
                // 'siren_id' => $boss->id,
                'hull_id' => $data['hull-hard'],
                'level' => $data['level-hard'],
                'hp' => $data['hp-hard'],
                'fp' => $data['fp-hard'],
                'trp' => $data['trp-hard'],
                'aa' => $data['aa-hard'],
                'avi' => $data['avi-hard'],
                'acc' => $data['acc-hard'],
                'eva' => $data['eva-hard'],
                'lck' => $data['lck-hard'],
                'spd' => $data['spd-hard'],
            ]);
        }

        if (isset($data['full-hp'])) {
            $boss->fullNormal()->create([
                'armor' => $data['full-armor'],
                // 'siren_id' => $boss->id,
                'hull_id' => $data['full-hull'],
                'level' => $data['full-level'],
                'hp' => $data['full-hp'],
                'fp' => $data['full-fp'],
                'trp' => $data['full-trp'],
                'aa' => $data['full-aa'],
                'avi' => $data['full-avi'],
                'acc' => $data['full-acc'],
                'eva' => $data['full-eva'],
                'lck' => $data['full-lck'],
                'spd' => $data['full-spd'],
            ]);
        }

        if (isset($data['full-hp-hard'])) {
            $boss->fullHard()->create([
                'armor' => $data['full-armor-hard'],
                // 'siren_id' => $boss->id,
                'hull_id' => $data['full-hull-hard'],
                'level' => $data['full-level-hard'],
                'hp' => $data['full-hp-hard'],
                'fp' => $data['full-fp-hard'],
                'trp' => $data['full-trp-hard'],
                'aa' => $data['full-aa-hard'],
                'avi' => $data['full-avi-hard'],
                'acc' => $data['full-acc-hard'],
                'eva' => $data['full-eva-hard'],
                'lck' => $data['full-lck-hard'],
                'spd' => $data['full-spd-hard'],
            ]);
        }


        return redirect('admin/sirens');
    }


    public function edit($id)
    {
        $siren = Siren::where('id', $id)->first();
        $hulls = Hull::all();

        return view('admin.siren.edit', compact('siren', 'hulls'));
    }


    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'weakness' => 'required',
            'img' => 'image',
            'armor' => 'required',
            'hull' => 'required',
            'level' => 'integer',
            'hp' => 'integer',
            'fp' => 'integer',
            'trp' => 'integer',
            'aa' => 'integer',
            'avi' => 'integer',
            'acc' => 'integer',
            'eva' => 'integer',
            'lck' => 'integer',
            'spd' => 'integer',
            'armor-hard' => '',
            'hull-hard' => '',
            'level-hard' => 'integer',
            'hp-hard' => 'integer',
            'fp-hard' => 'integer',
            'trp-hard' => 'integer',
            'aa-hard' => 'integer',
            'avi-hard' => 'integer',
            'acc-hard' => 'integer',
            'eva-hard' => 'integer',
            'lck-hard' => 'integer',
            'spd-hard' => 'integer',
            'full-armor' => '',
            'full-hull' => '',
            'full-level' => 'integer',
            'full-hp' => 'integer',
            'full-fp' => 'integer',
            'full-trp' => 'integer',
            'full-aa' => 'integer',
            'full-avi' => 'integer',
            'full-acc' => 'integer',
            'full-eva' => 'integer',
            'full-lck' => 'integer',
            'full-spd' => 'integer',
            'full-armor-hard' => '',
            'full-hull-hard' => '',
            'full-level-hard' => 'integer',
            'full-hp-hard' => 'integer',
            'full-fp-hard' => 'integer',
            'full-trp-hard' => 'integer',
            'full-aa-hard' => 'integer',
            'full-avi-hard' => 'integer',
            'full-acc-hard' => 'integer',
            'full-eva-hard' => 'integer',
            'full-lck-hard' => 'integer',
            'full-spd-hard' => 'integer',
        ]);

        $siren = Siren::where('id', $data['id'])->first();
        $siren->update([
            'name' => $data['name'],
            'boss_type' => $data['type'],
            'weakness' => $data['weakness'],
        ]);

        if (array_key_exists('img', $data)) {
            if ($siren->img != 'siren/img/no-pictures.png') {
                Storage::delete($siren->img);
            }
            $siren->update([
                'img' => $request->file('img')->store('siren/img'),
            ]);
        }

        $siren->normal->update([
            'armor' => $data['armor'],
            'hull_id' => $data['hull'],
            'level' => $data['level'],
            'hp' => $data['hp'],
            'fp' => $data['fp'],
            'trp' => $data['trp'],
            'aa' => $data['aa'],
            'avi' => $data['avi'],
            'acc' => $data['acc'],
            'eva' => $data['eva'],
            'lck' => $data['lck'],
            'spd' => $data['spd'],
        ]);

        if ($siren->boss_type == 'arbiter' || $siren->boss_type == 'stronghold' || $siren->boss_type == 'abyssal') {
            $siren->fullNormal->update([
                'armor' => $data['full-armor'],
                'hull_id' => $data['full-hull'],
                'level' => $data['full-level'],
                'hp' => $data['full-hp'],
                'fp' => $data['full-fp'],
                'trp' => $data['full-trp'],
                'aa' => $data['full-aa'],
                'avi' => $data['full-avi'],
                'acc' => $data['full-acc'],
                'eva' => $data['full-eva'],
                'lck' => $data['full-lck'],
                'spd' => $data['full-spd'],
            ]);
        }

        if ($siren->boss_type == 'arbiter') {
            $siren->hard->update([
                'armor' => $data['armor-hard'],
                'hull_id' => $data['hull-hard'],
                'level' => $data['level-hard'],
                'hp' => $data['hp-hard'],
                'fp' => $data['fp-hard'],
                'trp' => $data['trp-hard'],
                'aa' => $data['aa-hard'],
                'avi' => $data['avi-hard'],
                'acc' => $data['acc-hard'],
                'eva' => $data['eva-hard'],
                'lck' => $data['lck-hard'],
                'spd' => $data['spd-hard'],
            ]);

            $siren->fullHard->update([
                'armor' => $data['full-armor-hard'],
                'hull_id' => $data['full-hull-hard'],
                'level' => $data['full-level-hard'],
                'hp' => $data['full-hp-hard'],
                'fp' => $data['full-fp-hard'],
                'trp' => $data['full-trp-hard'],
                'aa' => $data['full-aa-hard'],
                'avi' => $data['full-avi-hard'],
                'acc' => $data['full-acc-hard'],
                'eva' => $data['full-eva-hard'],
                'lck' => $data['full-lck-hard'],
                'spd' => $data['full-spd-hard'],
            ]);
        }


        return redirect('admin/sirens');
    }
}
