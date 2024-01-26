<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post)
    {

        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->back();
    }
}
