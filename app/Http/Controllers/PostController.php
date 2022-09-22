<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    public function index()
    {
        return inertia('Posts/Index', [
            'posts' => PostResource::collection(Post::query()->paginate()),
        ]);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
    
    public function edit(Post $post)
    {
        $post->loadMissing('languages');

        return inertia('Posts/Edit', [
            'post' => new PostResource($post),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        App::setLocale($request->selected_language);
        
        $post->update($request->only(['title', 'content']));

        return redirect()->route('posts.index');
    }
}
