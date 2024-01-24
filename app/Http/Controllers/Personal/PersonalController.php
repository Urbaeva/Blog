<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $likesCount = auth()->user()->likedPosts()->count();
        $commentsCount= auth()->user()->comments()->count();
        return view('personal.main.index', compact('likesCount', 'commentsCount'));
    }
}
