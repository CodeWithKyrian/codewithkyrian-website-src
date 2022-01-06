<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        seo()->title('Programming Tutorials and Guides');
        $posts = Post::search($request->input('q'))->with('author', 'category')
            ->withCount('comments')->latest()->paginate(6)->withQueryString();
        $older = Post::query()->oldest()->limit(5)->get();
        $categories = Category::withCount('posts')->get();

        return view('posts.index', compact('posts', 'older', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post): View
    {
        $post->loadCount(['comments']);

        $older = Post::query()->oldest()->limit(5)->get();
        $categories = Category::withCount('posts')->get();

        views($post)->cooldown(now()->addHours(6))->record();

        seo()->title($post->title);
        seo()->description($post->description);
        seo()->image($post->getFirstMediaUrl('banner') ?: asset('img/placeholder.png'));

        return view('posts.show', compact('post', 'older', 'categories'));
    }
}
