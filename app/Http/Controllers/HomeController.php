<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function show($post)
    {           //select * from posts where slug = ? ->fetch
        $post = Post::where('slug', $post)->firstOrFail(); //404 caso não retorne nada...

        return view('posts.post', compact('post')); //php.net/compact
    }
}
