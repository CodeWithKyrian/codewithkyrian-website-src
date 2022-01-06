<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Show the application categories index.
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => Category::withCount('posts')->get()
        ]);
    }

     /**
     * Display the specified resource edit form.
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $post = Category::create($request->only(['name']));

        return redirect()->route('admin.categories.index')->withSuccess(__('categories.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->update($request->only(['name']));

        return redirect()->route('admin.categories.index')->withSuccess(__('categories.updated'));
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category  $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->withSuccess(__('categories.deleted'));
    }
}
