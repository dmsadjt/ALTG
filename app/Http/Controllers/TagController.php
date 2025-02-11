<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    public function add()
    {
        return view('admin.tag.add');
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'label' => 'required',
        ]);

        Tag::create([
            'tag_label' => $data['label'],
        ]);

        return redirect('admin/tags');
    }

    public function edit($id)
    {
        $tag = Tag::where('id', $id)->get();

        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'label' => 'required',
            'slug' => 'required',
        ]);


        $tag = Tag::where('id', '=', $data['id'])->first();
        $tag->tag_slug = null;
        $tag->update([
            'tag_label' => $data['label'],
        ]);

        return redirect('admin/tags');
    }

    public function delete($id)
    {
        $tag = Tag::where('id', $id)->first();
        $tag->posts()->detach();
        $tag->delete();

        return redirect('admin/tags');
    }
}
