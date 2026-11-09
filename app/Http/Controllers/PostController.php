<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // only published posts, drafts are hidden
        $query = Post::where('is_published', true);

        // filled() means it's in the url and not empty
        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // pinned first, then newest
        // 6 per page because Adan is only 4 letters (min 6)
        // withQueryString keeps ?q= and ?category= on page 2, 3...
        $posts = $query->orderByDesc('is_pinned')
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        // categories for the dropdown
        $categories = Post::query()->distinct()->orderBy('category')->pluck('category');

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        // drafts and missing posts give 404
        $post = Post::where('is_published', true)->findOrFail($id);

        // add 1 view then save to the database
        $post->views++;
        $post->save();

        return view('posts.show', compact('post'));
    }
}
