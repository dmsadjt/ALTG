<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Hull;

class HullController extends Controller
{
    public function add(){
        return view('admin.hull.add');
    }

    public function post(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'tag'=>'required',
            'slug'=>'required',
            'img'=>'required|image',
        ]);

        $hull = new Hull;
        $hull['hull_name'] = $data['name'];
        $hull['hull_tag'] = $data['tag'];
        $hull['hull_slug'] = $data['slug'];
        $hull['hull_img'] = $this->postImageRet($request, 'img', '/img/hulls');
        $hull->save();

        return redirect('admin/hulls');
    }

    public function edit($id){
        $hull = Hull::where('id',$id)->get();

        return view('admin.hull.edit', compact('hull'));
    }

    public function update(Request $request){
        $data = $request->validate([
            'id'=>'required',
            'name'=>'',
            'tag'=>'',
            'slug'=>'',
            'img'=>'',
        ]);

        $hull = Hull::where('id',$data['id']);

        $hull->update([
            'hull_name'=>$data['name'],
            'hull_tag'=>$data['tag'],
            'hull_slug'=>$data['slug'],
        ]);

        if(array_key_exists('img', $data)){
            $img = $this->updateImg($request,'img','/img/hulls',$hull, 'hull_img');
            $hull->update([
                'hull_img'=>$img,
            ]);
        }

        return redirect('admin/hulls');
    }

    public function delete($id){

        $hull = Hull::where('id','=',$id)->first();

        foreach ($hull->ship as $s){
            $s->update([
                'hull_id'=>'1',
            ]);
        }

        $hull->delete();

        return redirect('admin/hulls');
    }
}