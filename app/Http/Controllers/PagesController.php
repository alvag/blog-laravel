<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::published()->get()->sortByDesc('published_at');

        return view('welcome', compact('posts'));
    }
}
