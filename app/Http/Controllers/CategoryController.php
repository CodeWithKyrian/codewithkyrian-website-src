<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
        /**
     * Display the specified resource.
     */
    public function show(Request $request, Category $category): View
    {
        $category->posts = Post::withCount('comments')->where('category_id', $category->id)->paginate(5);

        $older = Post::query()->oldest()->limit(5)->get();
        $categories = Category::withCount('posts')->get();

        seo()->title($category->name . ' Posts');
        return view('category.show', compact('category', 'older', 'categories'));
    }
}
