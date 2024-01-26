<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
        return redirect()->route('post.show', $post->id);
    }
}
