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
        $cate = GearCategory::all();
        $temp = [
            'name' => 'required',
        ];

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                $g = strval($c->id) . '-gear-' . strval($j);
                $s = strval($c->id) . '-category-' . strval($j);
                $gears[$g] = '';
                $gears[$s] = '';
            }
        }

        $rules = array_merge($temp, $gears);
        $data = $request->validate($rules);

        $template = new Template();
        $template['name'] = $data['name'];
        $template->save();

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                if ($data[($c->id) . '-gear-' . ($j)] != null) {
                    $info = $data[$c->id. '-gear-' .$j];
                    $in = $data[$c->id. '-category-' .$j] != null ? $data[($c->id) . '-category-' . ($j)] : 'General';
                    $template->gears()->attach($info, ['gear_category' => $in]);
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
            $c = $this->selectSlot(1, $selected, $g->gear_type, '-category-');

            $selected[$k] = $g->id;
            $selected[$c] = $g->pivot->gear_category;
        }

        return view('admin.template.edit', compact('template', 'selected', 'gear_category', 'gears'));
    }

    public function update(Request $request){
        $cate = GearCategory::all();
        $temp = [
            'id'=>'required',
            'name' => 'required',
        ];

        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                $g = strval($c->id) . '-gear-' . strval($j);
                $s = strval($c->id) . '-category-' . strval($j);
                $gears[$g] = '';
                $gears[$s] = '';
            }
        }

        $rules = array_merge($temp, $gears);
        $data = $request->validate($rules);
        $template = Template::where('id', $data['id'])->first();
        $temp = array();

        $template->update([
            'name'=>$data['name'],
        ]);


        foreach ($cate as $c) {
            for ($j = 1; $j < 16; $j++) {
                if ($data[$c->id . '-gear-' . $j] != null) {
                    $id = $data[$c->id . '-gear-' . $j];
                    $pivot = 'gear_category';
                    $pivot_data = $data[$c->id . '-category-' . $j] != null ? $data[$c->id . '-category-' . $j] : 'General';
                    $temp[$id] = [$pivot => $pivot_data];
                }
            }
        }

        $template->gears()->sync($temp);

        return redirect('admin/templates');

    }
}
