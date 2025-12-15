<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->latest()->get();
        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.index')->with('success', 'Post berhasil dibuat!');
    }

    public function show($id)
    {
        $post = Post::with('comments.user')->findOrFail($id);
        return view('forum.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        return view('forum.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only(['title', 'content']));
        return redirect()->route('forum.index')->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('forum.index')->with('success', 'Post berhasil dihapus!');
    }

    // Metode untuk komentar (bisa ditambahkan sebagai route terpisah)
    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
