<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostLanguageController extends Controller
{
    public function index(Request $request)
    {
        return Language::query()
                            ->whereNotIn('id', $request->language_ids)
                            ->get(['id', 'name']);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'language_id' => 'required|exists:languages,id'
        ]);
        
        $post->languages()->attach($request->language_id);

        return redirect()->route('posts.edit', [
            'post' => $post,
            'locale' => Language::find($request->language_id)->locale,
        ]);
    }
}
