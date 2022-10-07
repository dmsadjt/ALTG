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
        $templates = Template::with('gears')->paginate(10);

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

        for ($i = 1; $i < 7; $i++) {
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

        for ($i = 1; $i < 7; $i++) {
            for ($j = 1; $j < 9; $j++) {
                if ($data[($i) . '-gear-' . ($j)] != null) {
                    $info = $data[$i . '-gear-' . $j];
                    $gears_array[$info] = ['gear_category' => $template->build, 'gear_slot' => $i];
                }
            }
        }
        $template->gears()->sync($gears_array);

        $template->save();

        return redirect('admin/templates');
    }

    public function edit($id)
    {
        $template = Template::where('id', $id)->first();
        $gear_category = GearCategory::all();
        $gears = Gear::all();

        for ($i = 1; $i < 7; $i++) {
            for ($j = 1; $j < 9; $j++) {
                $selected[$i . '-gear-' . $j] = '';
                $selected[$i . '-category-' . $j] = '';
            }
        }

        foreach ($template->gears as $key => $g) {
            $k = $this->selectSlot(1, $selected, $g->pivot->gear_slot, '-gear-');
            $c = $this->selectSlot(1, $selected, $g->pivot->gear_slot, '-category-');
            $selected[$k] = $g->id;
            $selected[$c] = $g->gear_type;
        }

        return view('admin.template.edit', compact('template', 'selected', 'gear_category', 'gears'));
    }

    public function update(Request $request)
    {
        $temp = [
            'id' => 'required',
            'name' => 'required',
            'build' => 'required',
        ];

        for ($i = 1; $i < 7; $i++) {
            for ($j = 1; $j < 9; $j++) {
                $g = strval($i) . '-gear-' . strval($j);
                $gears[$g] = '';
            }
        }

        $rules = array_merge($temp, $gears);
        $data = $request->validate($rules);

        switch ($request->submit) {
            case 'Edit Template':
                $template = Template::where('id', $data['id'])->first();
                $template->update([
                    'name' => $data['name'],
                    'build' => $data['build'],
                ]);
                break;

            case 'Save as new Template':
                $template = new Template();
                $template['name'] = $data['name'];
                $template['build'] = $data['build'];
                $template->save();
                break;
        }



        $gears_array = array();

        for ($i = 1; $i < 7; $i++) {
            for ($j = 1; $j < 9; $j++) {
                if ($data[$i . '-gear-' . $j] != null) {
                    $id = $data[$i . '-gear-' . $j];
                    // array_push($temp, $id);
                    $gears_array[$id] = ['gear_category' => $template->build, 'gear_slot' => $i];
                }
            }
        }

        // dd($gears_array);
        $template->gears()->sync($gears_array);

        return redirect('admin/templates');
    }

    public function delete($id)
    {
        $template = Template::where('id', $id)->first();

        $template->gears()->detach();

        $template->delete();

        return redirect('admin/templates');
    }
}
