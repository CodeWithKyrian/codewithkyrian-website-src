<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{ seo()->render() }}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/monokai.min.css">
    <x-feed-links />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-sans">
    <div id="app" class="overflow-x-hidden bg-[#f5f8fb]">
        <x-blog.navbar></x-blog.navbar>

        <section class="px-4 py-8">
            <div class="container mx-auto">
                <div class="flex flex-wrap overflow-hidden">
                    <div class="w-full overflow-hidden md:w-4/6 md:pr-2 py-4">
                        <div class="mb-6 bg-white p-4 md:p-8 rounded-md shadow-md">
                            <div>
                                <div class="mb-6">
                                    <a href="#"
                                        class="text-indigo-600 hover:text-gray-700 transition duration-500 ease-in-out text-sm uppercase">{{ $post->category->name }}</a>
                                    <h1 href="#" class="text-gray-900 font-bold text-3xl">{{ $post->title }}</h1>
                                    <div class="py-5 text-sm font-regular text-gray-900 flex">
                                        <span class="mr-3 flex flex-row items-center">
                                            <svg class="text-blue-600" fill="currentColor" height="13px" width="13px"
                                                version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
                                                                c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
                                                                c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z" />
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="ml-1">{{ humanize_date($post->created_at) }}</span>
                                        </span>
                                        <a href="#"
                                            class="hidden md:flex flex-row items-center hover:text-indigo-600  mr-3">
                                            <svg class="text-blue-600" fill="currentColor" height="16px"
                                                aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor"
                                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                                </path>
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                            </svg>
                                            <span class="ml-1">{{ $post->author->fullname }}</span>
                                        </a>
                                        <a href="#" class="flex flex-row items-center hover:text-indigo-600">
                                            <svg class="text-blue-600" fill="currentColor" height="16px"
                                                viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16,0A16,16,0,1,0,32,16,16,16,0,0,0,16,0Zm0,28A12,12,0,1,1,28,16,12.013,12.013,0,0,1,16,28Z" />
                                                <path
                                                    d="M20.02,16H17a1,1,0,0,1-1-1V11.98A1.979,1.979,0,0,0,14.02,10h-.04A1.979,1.979,0,0,0,12,11.98v6.04A1.979,1.979,0,0,0,13.98,20h6.04A1.979,1.979,0,0,0,22,18.02v-.04A1.979,1.979,0,0,0,20.02,16Z" />
                                            </svg>
                                            <span class="ml-1">{{ read_time($post->content) }}</span>
                                        </a>
                                    </div>
                                    <hr />
                                </div>
                                <div class="mb-4">
                                    @if ($post->hasMedia('banner'))
                                        {{ $post->getFirstMedia('banner') }}
                                    @else
                                        <img src="{{ asset('img/placeholder.png') }}" alt="{{ $post->title }}">
                                    @endif
                                </div>
                                <div v-pre id="postContent" class="prose text-gray-900 font-thin">
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                        <div class="pb-6">
                            <x-blog.bottom-nav :post="$post"></x-blog.bottom-nav>
                        </div>
                        <div class="pb-6">
                            <x-blog.comments :post="$post"></x-blog.comments>
                        </div>
                    </div>

                    <div class="w-full overflow-hidden md:w-2/6 md:pl-2 py-4">
                        <x-blog.sidebar :posts="$older" :categories="$categories"></x-blog.sidebar>
                    </div>
                </div>
            </div>
        </section>
        <x-blog.footer></x-blog.footer>
    </div>
    {!! app('Tightenco\Ziggy\BladeRouteGenerator')->generate() !!}
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
    <script src="https://unpkg.com/highlightjs-blade/dist/blade.min.js"></script>
    <script src="{{ asset('js/highlightjs-badge.min.js') }}"></script>
    <script>
        hljs.highlightAll();

        window.addEventListener('load', (event) => {
            var options = {
                contentSelector: "#postContent",
                copyIconClass: "code-copy",
                checkIconClass: "code-check"
            };

            setTimeout(highlightJsBadge(options), 500);

        });
    </script>
</body>

</html>
