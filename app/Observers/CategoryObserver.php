<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Listen to the Post saving event.
     */
    public function saving(Category $category): void
    {
        $category->slug = Str::slug($category->name);
    }

    public function updating(Category $category)
    {
        $category->slug = Str::slug($category->name);
    }
}
