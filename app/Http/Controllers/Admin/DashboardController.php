<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use CyrildeWit\EloquentViewable\Support\Period;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'comments_count' =>  Comment::lastWeek()->count(),
            'posts_count' => Post::lastWeek()->count(),
            'views_count' => views(Post::class)->unique()->period(Period::pastWeeks(1))->count(),
        ]);
    }
}
