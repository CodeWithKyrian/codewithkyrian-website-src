<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{ seo()->render() }}

    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" /> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <x-feed-links />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-sans">
    <div id="app" class="overflow-x-hidden bg-[#f5f8fb]">
        <x-blog.navbar></x-blog.navbar>

        <section class="px-4 py-8">
            <div class="container flex flex-col lg:flex-row justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            @if (request()->has('q'))
                                {{ trans_choice('posts.search_results', $posts->total(), ['query' => request()->input('q')]) }}

                            @else
                                @lang('posts.latest_posts')
                            @endif
                        </h1>
                        <div>
                            <select
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>Latest</option>
                                <option>Last Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="relative border rounded-sm overflow-hidden">
                            <form action="{{ route('home') }}" method="GET">
                                <input class="w-full relative px-4 py-3 font-light text-gray-900 border-0" type="text"
                                    name="q" id="" placeholder="Search...">
                                <button type="submit" class="bg-transparent border-0 absolute right-0 px-4 py-3 top-0">
                                    <span class="block w-5">
                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M495 466.2L377.2 348.4c29.2-35.6 46.8-81.2 46.8-130.9C424 103.5 331.5 11 217.5 11 103.4 11 11 103.5 11 217.5S103.4 424 217.5 424c49.7 0 95.2-17.5 130.8-46.7L466.1 495c8 8 20.9 8 28.9 0 8-7.9 8-20.9 0-28.8zm-277.5-83.3C126.2 382.9 52 308.7 52 217.5S126.2 52 217.5 52C308.7 52 383 126.3 383 217.5s-74.3 165.4-165.5 165.4z" />
                                        </svg>
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4 w-full">
                        {{ $posts->links() }}
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-6">
                        @foreach ($posts as $post)
                            <div
                                class="group relative overflow-hidden bg-white shadow transition-transform duration-300 rounded-md hover:scale-[102%]">
                                <a href="{{ route('posts.show', $post) }}">
                                    <div class="flex-1">
                                        <div class="relative flex justify-center items-center overflow-hidden">
                                            @if ($post->hasMedia('banner'))
                                                {{ $post->getFirstMedia('banner') }}
                                            @else
                                                <img src="{{ asset('img/placeholder.png') }}"
                                                    alt="{{ $post->title }}">
                                            @endif
                                        </div>
                                        <div class="p-4">
                                            <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400 line-clamp-2">
                                                {{ $post->title }}
                                            </h2>
                                            <p class="mt-2 text-gray-600 dark:text-gray-400 line-clamp-2">
                                                {{ $post->description }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between p-4">
                                        <div class="font-light text-gray-400">
                                            <span>{{ $post->created_at->diffForHumans() }} •
                                                {{ read_time($post->content) }}
                                        </div>
                                        <div class="">
                                            <span
                                                class="text-gray-400 mr-3 inline-flex items-center cursor-pointer lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                                <svg class="h-4 w-4 mr-1" stroke="currentColor" stroke-width="2"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                    viewBox="0 0 24 24">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>{{ views($post)->unique()->count() }}
                                            </span>
                                            <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                                    </path>
                                                </svg>{{ $post->comments_count }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('categories.show', $post->category) }}"
                                    class="absolute top-4 right-4 inline bg-gray-600 hover:bg-gray-700 text-white text-sm select-none px-3 py-1 whitespace-nowrap rounded-full">
                                    {{ $post->category->name }}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8 w-full">
                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="w-full lg:ml-6 lg:w-4/12">
                    <x-blog.sidebar :posts="$older" :categories="$categories"></x-blog.sidebar>
                </div>
            </div>
        </section>
        <x-blog.footer></x-blog.footer>
    </div>
    {!! app('Tightenco\Ziggy\BladeRouteGenerator')->generate() !!}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
