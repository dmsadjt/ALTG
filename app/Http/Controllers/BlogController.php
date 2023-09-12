<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostThumbnail;
use App\Models\Tag;
use App\Models\TemporaryImageUpload;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BlogController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->with('tags')->paginate(5);

        return view('blog.index', compact('posts'));
    }

    public function view($id)
    {
        if (Post::where('id', $id)->first() == null) {
            return view('dump');
        }
        $post = Post::where('id', $id)->with(['tags'])->first();
        $previous = Post::where('id', '<', $post->id)->max('id');
        $next = Post::where('id', '>', $post->id)->min('id');

        return view('blog.view', compact(['post', 'previous', 'next']));
    }

    public function add()
    {
        $tags = Tag::all();
        return view('admin.post.add', compact('tags'));
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => '',
            'thumbnail-image' => 'image',
            'tag-1' => '',
            'tag-2' => '',
            'tag-3' => '',
            'tag-4' => '',
            'tag-5' => '',
        ]);

        $post = new Post;
        $post['title'] = $data['title'];
        $post['body'] = $data['body'];
        if (array_key_exists('thumbnail-image', $data)) {
            $post['thumbnail'] = $request->file('thumbnail-image')->store('posts/thumbnail');
        }
        $post->save();

        $temp = array();
        for ($i = 1; $i < 6; $i++) {
            if ($data['tag-' . $i] != null) {
                array_push($temp, $data['tag-' . $i]);
            }
        }
        $post->tags()->sync($temp);

        $postImage = TemporaryImageUpload::all();

        foreach ($postImage as $p) {
            PostImage::create([
                'post_id' => $post->id,
                'image' => $p->image,
            ]);
        }

        TemporaryImageUpload::truncate();

        return redirect('admin/blogs');
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::where('id', $id)->get();
        $post1 = Post::where('id', $id)->first();
        if (!$post || !$post1) {
            return view('dump');
        }
        for ($i = 1; $i < 6; $i++) {
            $selected['tag-' . $i] = '';
        }

        foreach ($post1->tags as $key => $t) {
            $selected['tag-' . ($key + 1)] = $t->id;
        }

        return view('admin.post.edit', compact(['tags', 'post', 'selected']));
    }

    public function update(Request  $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'oldImage' => '',
            'title' => 'required',
            'body' => '',
            'thumbnail-image' => 'image',
            'tag-1' => '',
            'tag-2' => '',
            'tag-3' => '',
            'tag-4' => '',
            'tag-5' => '',
        ]);

        $post = Post::where('id', $data['id'])->first();


        if ($request->file('thumbnail-image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['thumbnail-image'] = $request->file('thumbnail-image')->store('posts/thumbnail');
        }

        $post->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'thumbnail' => $request->file('thumbnail-image') ? $data['thumbnail-image'] : $post->thumbnail
        ]);

        $temp = array();
        for ($i = 1; $i < 6; $i++) {
            if ($data['tag-' . $i] != null) {
                array_push($temp, $data['tag-' . $i]);
            }
        }
        $post->tags()->sync($temp);

        $postImage = TemporaryImageUpload::all();

        foreach ($postImage as $p) {
            PostImage::create([
                'post_id' => $post->id,
                'image' => $p->image,
            ]);
        }

        TemporaryImageUpload::truncate();

        return redirect('admin/blogs');
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->first();
        $post->tags()->detach();

        $postImage = PostImage::where('post_id', $id)->get();

        foreach ($postImage as $pp) {
            Storage::delete($pp->image);
        }

        if ($post->thumbnail) {
            Storage::delete($post->thumbnail);
        }

        $post->delete();

        return redirect('admin/blogs');
    }
}
