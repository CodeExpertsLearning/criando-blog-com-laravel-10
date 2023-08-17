<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\User;

class PostsController extends Controller
{
    public function __construct(private Post $post)
    {
    }

    public function index()
    {
        $posts = $this->post->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(User $user, Category $category)
    {
        $users = $user->all(['id', 'name']); //select id, name from users
        $categories = $category->all(['id', 'name']);
        return view('admin.posts.create', compact('users', 'categories'));
    }

    public function store(PostRequest $request, User $user)
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
        $data['thumb'] = $request->thumb?->store('posts', 'public');

        //$user = auth()->user(); //model User populado com os dados do user autenticado
        $user = $user->find($request->user);
        $post = $user->posts()->create($data);
        $post->categories()->sync($request->categories);

        return redirect()->route('admin.posts.index');
    }

    public function edit($post)
    {
        $post = $this->post->findOrFail($post);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($post, PostRequest $request)
    {
        $post = $this->post->findOrFail($post);

        $data = $request->all();

        if ($request->thumb) {
            if ($post->thumb) Storage::disk('public')->delete($post->thumb);

            $data['thumb'] = $request->thumb?->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.edit', $post->id);
    }

    public function destroy($post)
    {
        $post = $this->post->findOrFail($post);
        $post->delete();

        return redirect()->back();
    }
}
