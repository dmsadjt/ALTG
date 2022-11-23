<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    public function store(Request $request)
    {
        $blog = new Post();
        $blog->id = 0;
        $blog->exists = true;
        $image = $request->file('upload')->store('posts/img');

        return response()->json([
            'url' => asset('storage/' . $image)
        ]);
    }
}
