<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function about()
    {
        seo()->title('About Kyrian Obikwelu');
        seo()->image(asset('img/me.png'));
        return view('home.about');
    }
}
