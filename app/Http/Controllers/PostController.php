<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */public function index() {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
}

public function create() {
    return view('posts.create');
}

public function store(Request $request) {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Post::create($request->all());
    return redirect()->route('posts.index')->with('success', 'Post created!');
}

public function edit(Post $post) {
    return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post) {
    $post->update($request->all());
    return redirect()->route('posts.index')->with('success', 'Post updated!');
}

public function destroy(Post $post) {
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted!');
}
}