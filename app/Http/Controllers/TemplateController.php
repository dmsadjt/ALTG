<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Gear;
use App\Models\GearCategory;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::paginate(10);

        return view('admin.template.index', compact('templates'));
    }

    public function add()
    {
        $gears = Gear::all();
        $gear_category = GearCategory::all();

        return view('admin.template.add', compact('gears', 'gear_category'));
    }

    public function post(Request $request)
    {
        $temp = [
            'name' => 'required',
            'build' => 'required',
        ];

        for ($i = 1; $i < 7 ; $i++) {
            for ($j = 1; $j < 9; $j++) {
                $g = strval($i) . '-gear-' . strval($j);
                $gears[$g] = '';
            }
        }

        $rules = array_merge($temp, $gears);
        $data = $request->validate($rules);

        $template = new Template();
        $template['name'] = $data['name'];
        $template['build'] = $data['build'];
        $template->save();

        for ($i = 1; $i < 7 ; $i++) {
            for ($j = 1; $j < 9; $j++) {
                if ($data[($i) . '-gear-' . ($j)] != null) {
                    $info = $data[$i. '-gear-' .$j];
                    $template->gears()->attach($info, ['gear_category' => $template->build, 'gear_slot' => $i]);
                }
            }
        }

        $template->save();

        return redirect('admin/templates');
    }

    public function edit($id){
        $template = Template::where('id', $id)->first();
        $gear_category = GearCategory::all();
        $gears = Gear::all();

        foreach ($gear_category as $c) {
            for ($j = 1; $j < 16; $j++) {
                $selected[$c->id . '-gear-' . $j] = '';
                $selected[$c->id . '-category-' . $j] = '';
            }
        }

        foreach ($template->gears as $key => $g) {
            $k = $this->selectSlot(1, $selected, $g->gear_type, '-gear-');
            $selected[$k] = $g->id;
        }

        return view('admin.template.edit', compact('template', 'selected', 'gear_category', 'gears'));
    }

    public function update(Request $request){
        $cate = GearCategory::all();
        $temp = [
            'id'=>'required',
            'name' => 'required',
            'build' => 'required',
        ];

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                $g = strval($c->id) . '-gear-' . strval($j);
                $gears[$g] = '';
            }
        }

        $rules = array_merge($temp, $gears);
        $data = $request->validate($rules);
        $template = Template::where('id', $data['id'])->first();
        $temp = array();

        $template->update([
            'name'=>$data['name'],
            'build'=>$data['build'],
        ]);


        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                if ($data[$c->id . '-gear-' . $j] != null) {
                    $id = $data[$c->id . '-gear-' . $j];
                    array_push($temp, $id);
                }
            }
        }

        $template->gears()->syncWithPivotValues($temp, ['gear_category'=>$template->build]);

        return redirect('admin/templates');

    }

    public function delete($id){
        $template = Template::where('id',$id)->first();

        $template->gears()->detach();

        $template->delete();

        return redirect('admin/templates');

    }
}
