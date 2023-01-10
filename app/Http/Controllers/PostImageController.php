<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use App\Models\TemporaryImageUpload;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    public function store(Request $request)
    {
        $image = new TemporaryImageUpload();
        $image->image = $request->file('upload')->store('posts/img');
        $image->save();

        return response()->json([
            'url' => asset('storage/' . $image->image)
        ]);
    }
}
