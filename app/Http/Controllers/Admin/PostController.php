<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Models\Category;
use App\Models\MediaLibrary;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{

    /**
     * Show the application posts index.
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::withCount('comments')->with('category')->latest()->paginate(10)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request): RedirectResponse
    {
        $post = Post::create($request->only(['title', 'description', 'content', 'posted_at', 'author_id', 'category_id']));
        $post->addMediaFromRequest('banner')->withResponsiveImages()->toMediaCollection('banner');

        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->only(['title', 'description', 'content', 'posted_at', 'author_id', 'category_id']));
        if ($request->hasFile('banner'))
            $post->addMediaFromRequest('banner')->withResponsiveImages()->toMediaCollection('banner');


        return redirect()->route('admin.posts.index')->withSuccess(__('posts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post  $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->withSuccess(__('posts.deleted'));
    }
}
