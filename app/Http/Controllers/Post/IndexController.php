<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $popularPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('post.index', compact('posts', 'randomPosts', 'popularPosts'));
    }

    public function show(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $userName = auth()->user()->name;
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        return view('post.show', compact('post', 'userName', 'date', 'relatedPosts'));
    }
}
