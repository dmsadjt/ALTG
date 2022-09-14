<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Tag;
use PhpOffice\PhpSpreadsheet\IOFactory;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('blog.index', compact('posts'));
    }

    public function view($id)
    {
        if (Post::where('id', $id)->first() == null) {
            return view('dump');
        }
        $post = Post::where('id', $id)->first();
        $table = array();
        if ($post->table != null) {
            $file_dir = 'files/post/' . $post->table;

            $spreadsheet = IOFactory::load($file_dir);
            $column = $spreadsheet->getActiveSheet()->getColumnDimensions();
            $rowSize = $spreadsheet->getActiveSheet()->getHighestRow();
            $i = 1;
            for ($j = 1; $j <= $rowSize; $j++) {
                foreach ($column as $key => $c) {
                    $table[$j][$i] = $spreadsheet->getActiveSheet()->getCell($key . $j)->getValue();
                    $i++;
                }
                $i = 1;
            }
        } else $table = ['null'];

        // dd($table);

        $previous = Post::where('id', '<', $post->id)->max('id');
        $next = Post::where('id', '>', $post->id)->min('id');

        return view('blog.view', compact(['post', 'previous', 'next', 'table']));
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
            'table' => 'file',
            'image-1' => 'image',
            'caption-1' => '',
            'image-2' => 'image',
            'caption-2' => '',
            'image-3' => 'image',
            'caption-3' => '',
            'image-4' => 'image',
            'caption-4' => '',
            'image-5' => 'image',
            'caption-5' => '',
            'tag-1' => '',
            'tag-2' => '',
            'tag-3' => '',
            'tag-4' => '',
            'tag-5' => '',
        ]);

        $post = new Post;
        $post['title'] = $data['title'];
        $post['body'] = $data['body'];
        $post['table'] = $data['table'] != null ? $this->postImageRet($request, 'table', '/files/post') : null;
        $post->save();
        for ($i = 1; $i < 6; $i++) {
            if (array_key_exists('image-' . $i, $data)) {
                ${'image-' . $i} = new PostImage;
                ${'image-' . $i}['post_id'] = $post->id;
                ${'image-' . $i}['image'] = $this->postImageRet($request, 'image-' . $i, '/img/posts/');
                ${'image-' . $i}['caption'] = array_key_exists('caption-' . $i, $data) ? $data['caption-' . $i] : 'No captions';
                ${'image-' . $i}->save();
            }
        }
        $temp = array();
        for ($i = 1; $i < 6; $i++) {
            if ($data['tag-' . $i] != null) {
                array_push($temp, $data['tag-' . $i]);
            }
        }
        $post->tags()->sync($temp);

        return redirect('admin/blogs');
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::where('id', $id)->get();
        $post1 = Post::where('id', $id)->first();

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
            'title' => 'required',
            'body' => '',
            'image-1' => 'image',
            'caption-1' => '',
            'image-2' => 'image',
            'caption-2' => '',
            'image-3' => 'image',
            'caption-3' => '',
            'image-4' => 'image',
            'caption-4' => '',
            'image-5' => 'image',
            'caption-5' => '',
            'image-id-1' => '',
            'image-id-2' => '',
            'image-id-3' => '',
            'image-id-4' => '',
            'image-id-5' => '',
            'tag-1' => '',
            'tag-2' => '',
            'tag-3' => '',
            'tag-4' => '',
            'tag-5' => '',
        ]);

        $post = Post::where('id', $data['id'])->first();
        $post->update([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);

        for ($i = 1; $i < 6; $i++) {
            if (array_key_exists('image-' . $i, $data)) {
                ${'image-' . $i} = PostImage::where('id', $data['image-id-' . $i]);
                $img = $this->updateImg($request, 'image-' . $i, '/img/posts/', $post->images, 'image');
                ${'image-' . $i}->update([
                    'image' => $img,
                    'caption' => $data['caption-' . $i],
                ]);
            }
        }

        $temp = array();
        for ($i = 1; $i < 6; $i++) {
            if ($data['tag-' . $i] != null) {
                array_push($temp, $data['tag-' . $i]);
            }
        }
        $post->tags()->sync($temp);

        return redirect('admin/blogs');
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->first();
        $post->tags()->detach();

        foreach ($post->images as $i) {
            $i->delete();
        }

        $post->delete();

        return redirect('admin/blogs');
    }
}
