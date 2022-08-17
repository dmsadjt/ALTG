<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siren;
use App\Models\Hull;

class SirenController extends Controller
{
    public function index()
    {
        $stronghold_none = Siren::where('boss_type', '=', 'stronghold')->where('adaptability', '=', 'none')->get();
        $stronghold_full = Siren::where('boss_type', '=', 'stronghold')->where('adaptability', '=', 'full')->get();

        $abyssal_none = Siren::where('boss_type', '=', 'abyssal')->where('adaptability', '=', 'none')->get();
        $abyssal_full = Siren::where('boss_type', '=', 'abyssal')->where('adaptability', '=', 'full')->get();

        $arbiter_none_normal = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'none')->where('difficulty', '=', 'normal')->get();
        $arbiter_none_hard = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'none')->where('difficulty', '=', 'hard')->get();
        $arbiter_full_normal = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'full')->where('difficulty', '=', 'normal')->get();
        $arbiter_full_hard = Siren::where('boss_type', '=', 'arbiter')->where('adaptability', '=', 'full')->where('difficulty', '=', 'hard')->get();

        $guild = Siren::where('boss_type', '=', 'guild')->get();
        $meta = Siren::where('boss_type', '=', 'meta')->get();

        $last_updated = Siren::orderBy('updated_at','desc')->first();

        return view('siren.index', compact(
            'stronghold_none', 'stronghold_full', 'abyssal_none', 'abyssal_full', 'arbiter_none_normal',
            'arbiter_none_hard', 'arbiter_full_normal', 'arbiter_full_hard', 'guild', 'meta','last_updated'));
    }

    public function edit($id){
        $siren = Siren::where('id',$id)->get();
        $hulls = Hull::all();
        $selected['type'] = $siren[0]->boss_type;
        $selected['difficulty'] = $siren[0]->difficulty;
        $selected['adaptability'] = $siren[0]->adaptability;
        $selected['hull'] = $siren[0]->hull;
        $selected['armor'] = $siren[0]->armor;


        return view('admin.siren.edit', compact('siren','hulls','selected'));
    }

    public function update(Request $request){
        $data = $request->validate([
            'id'=>'required',
            'name'=>'',
            'hull'=>'',
            'level'=>'integer',
            'armor'=>'',
            'hp'=>'integer',
            'fp'=>'integer',
            'trp'=>'integer',
            'aa'=>'integer',
            'avi'=>'integer',
            'acc'=>'integer',
            'eva'=>'integer',
            'lck'=>'integer',
            'spd'=>'integer',
            'weakness'=>'',
            'img'=>'image',
        ]);

        $siren = Siren::where('id', $data['id']);
        $siren->update([
            'name'=>$data['name'],
            'hull'=>$data['hull'],
            'level'=>$data['level'],
            'armor'=>$data['armor'],
            'hp'=>$data['hp'],
            'fp'=>$data['fp'],
            'trp'=>$data['trp'],
            'aa'=>$data['aa'],
            'avi'=>$data['avi'],
            'acc'=>$data['acc'],
            'eva'=>$data['eva'],
            'lck'=>$data['lck'],
            'spd'=>$data['spd'],
            'weakness'=>$data['weakness'],
        ]);

        if(array_key_exists('img', $data)){
            $img = $this->updateImg($request, 'img','/img/siren/',$siren,'img');
            $siren->update([
                'img'=>$img,
            ]);
        }

        return redirect('admin/sirens');

    }

}
