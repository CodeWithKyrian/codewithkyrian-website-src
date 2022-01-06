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
                <div class="flex flex-wrap overflow-hidden justify-center">
                    <div class="w-full overflow-hidden md:w-4/6 md:pr-2 py-4">
                        <div class="mb-6 bg-white p-4 md:p-8 rounded-md shadow-md">
                            <div>
                                <div class="mb-6">

                                    <h1 class="text-gray-900 font-bold text-3xl">About Kyrian Obikwelu</h1>
                                    <div class="py-5 text-sm font-regular text-gray-900 flex flex-col md:flex-row flex-wrap">
                                        <div class="mr-3 my-1 flex flex-row items-center">
                                            <svg class="text-blue-600 fill-current" viewBox="0 0 6.0606 6.35"
                                                height="16px" stroke="current">
                                                <g transform="translate(-123.61 -133.75)">
                                                    <path
                                                        d="m126.65 133.75-3.0344 1.9513v4.3987h6.0606v-4.3987zm-2.2738 3.1254 1.5131 0.97565-1.5131 0.96739zm4.5475 0v1.943l-1.5131-0.97566zm-2.2738 1.3146 1.7859 1.1493h-3.5719z" />
                                                </g>
                                            </svg>
                                            <a href="mailto:kyrianobikwelu@gmail.com"
                                                class="ml-2 underline">kyrianobikwelu@gmail.com</a>
                                        </div>
                                        <div class="mr-3 my-1 flex flex-row items-center">
                                            <svg viewBox="0 0 512 512" class="text-blue-600 w-4 h-4 fill-current">
                                                <path
                                                    d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z">
                                                </path>
                                            </svg>
                                            <a href="https://linkedin.com/kyrian-obikwelu"
                                                class="ml-2 underline">Kyrian Obikwelu</a>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                                <div class="mb-4">
                                    <img src="{{ asset('img/me.png') }}" alt="Kyrian Obikwelu">
                                </div>
                                <div class="prose max-w-none text-gray-900 font-thin">
                                    <h1 class="">Greetings!!</h1>
                                    <p>
                                        I am Kyrian Obikwelu, a Nigerian-based software developer and founder of
                                        CodeWithKyrian — an educational media platform for learning about programming.
                                    <p>
                                        I started out as a freelance programmer in 2018, working primarily through
                                        crowdsourcing sites like Upwork. Web develpment is my best-selling service, and
                                        it was the type of programming I enjoyed most, so I branded myself as a web
                                        developer.
                                    <p>
                                        I have served up to 20 Clients and counting. In 2022 I launched <a
                                            href="{{ route('home') }}">CodeWithKyrian.com</a> as an independent
                                        platform where I could offer my services and knowledge help others around me
                                        with what I'd learnt and build a business infrastructure of my own. It was a
                                        means to work on my self development and writing skills as well.
                                    <p>
                                        I am promoting the site by creating content that brings in search traffic —
                                        primarily YouTube videos and written articles for programmers in PHP ,
                                        JavaScript, C#, etc. using technologies like <a
                                            href="{{ route('categories.show', 'vuejs') }}">Vuejs</a>, <a
                                            href="{{ route('categories.show', 'laravel-php') }}">Laravel</a>, <a
                                            href="{{ route('categories.show', 'unity-c') }}">Unity3d</a> and more.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-blog.footer></x-blog.footer>
    </div>
    {!! app('Tightenco\Ziggy\BladeRouteGenerator')->generate() !!}
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
