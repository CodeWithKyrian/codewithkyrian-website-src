<?php

namespace App\Http\Middleware;

use Closure;
use romanzipp\Seo\Structs\Link;
use romanzipp\Seo\Structs\Meta;
use romanzipp\Seo\Structs\Meta\OpenGraph;
use romanzipp\Seo\Structs\Meta\Twitter;
use Spatie\SchemaOrg\Schema;
use romanzipp\Seo\Structs\Script;
use Illuminate\Http\Request;

class AddSeoDefaults
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        seo()->charset();
        seo()->viewport();

        seo()->title('CodeWithKyrian');
        seo()->description("Code with Kyrian Obikwelu. An educational media platform for learning about web and game development technologies including programming guides on Laravel, Unity, VueJS, Tailwind CSS and more!");

        seo()->csrfToken();

        seo()->addSchema(
            Schema::localBusiness()->name('CodeWithKyrian')->email('kyrianobikwelu@gmail.com')
        );

        seo()->addMany([

            Meta::make()->name('copyright')->content(config('app.author')),
            Meta::make()->name('author')->content(config('app.author')),

            Meta::make()->name('mobile-web-app-capable')->content('yes'),
            Meta::make()->name('theme-color')->content('#f03a17'),

            Link::make()->rel('icon')->href(asset('favicon.ico')),

            OpenGraph::make()->property('title')->content(config('app.name')),
            OpenGraph::make()->property('site_name')->content(config('app.name')),
            OpenGraph::make()->property('locale')->content('en_NG'),

            Twitter::make()->name('card')->content('summary_large_image'),
            Twitter::make()->name('site')->content('@CodeWithKyrian'),
            Twitter::make()->name('creator')->content('@CodeWithKyrian'),
            Twitter::make()->name('image')->content(asset('img/banner.png'), false)

        ]);
        
        // seo('body')->add(
        //     Script::make()->attr('src', '/js/app.js')
        // );

        return $next($request);
    }
}
