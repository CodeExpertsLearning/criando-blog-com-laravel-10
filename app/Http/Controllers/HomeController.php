<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function __construct(private Post $post)
    {
    }

    public function index()
    {
        $posts = $this->post->where('is_active', true)->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show($post)
    {           //select * from posts where slug = ? ->fetch
        $post = $this->post->where('slug', $post)->firstOrFail(); //404 caso não retorne nada...

        return view('posts.post', compact('post')); //php.net/compact
    }
}
