<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        //Active record way
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->body = $request->body;
        // $post->is_active = $request->is_active;
        // $post->slug = Str::slug($request->title);

        // $post->save();

        //Mass Assignment way
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);

        Post::create($data);

        return redirect()->route('admin.posts.index');
    }
}
