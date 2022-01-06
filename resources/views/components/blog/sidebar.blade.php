@props(['posts', 'categories'])
<div class="px-2 mt-10">
    <h2 class="font-bold text-xl mb-4 text-gray-700">Categories</h2>
    <ul class="px-6 py-4 mx-auto bg-white rounded-md shadow-md">
        @foreach ($categories as $category)
            <li class="flex">
                <a href="{{ route('categories.show', $category) }}"
                    class="text-gray-700 hover:text-gray-600 hover:underline py-2 block flex-1">{{ $category->name }}</a>
                <span class="text-gray-700 font-thin p-2">{{ $category->posts_count }}</span>
            </li>
        @endforeach
    </ul>
</div>
<div class="px-2 mt-10">
    <h2 class="text-xl mb-5 text-gray-900 font-bold">Older Posts</h2>
    <ul class="px-6 py-4 mx-auto bg-white rounded-md shadow-md">
        @foreach ($posts as $post)
            <li class="mb-3">
                <a href="{{ route('posts.show', $post) }}" class="flex group">
                    <div class="w-1/3">
                        <img class="rounded"
                            src="{{ $post->thumbnail }}"
                            alt="">
                    </div>
                    <div class="w-2/3 p-2">
                        <h3 class="text-gray-800 group-hover:text-orange-500 font-bold text-sm mb-2">
                            {{ $post->title }}
                        </h3>
                        <span
                            class="text-xs text-gray-700 font-thin block mb-5">{{ $post->created_at->diffForHumans() }} • {{ read_time($post->content) }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<div class="px-2 mt-10">
    <div class="py-5 px-6 bg-gray-100 rounded-md">
        <div class="w-10 mx-auto mt-6 text-gray-900">
            <svg class="fill-current" viewBox="-1 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M505.668 246.465c-.89-.906-54.297-54.309-55.668-55.68V55c0-30.328-24.672-55-55-55H115C84.672 0 60 24.672 60 55v135.785C.379 250.406 0 248.301 0 257v210c0 24.813 20.188 45 45 45h420c24.813 0 45-20.188 45-45V257c0-3.855-1.54-7.71-4.332-10.535zm-35.992 6.426L450 262.73v-29.516zM115 30h280c13.785 0 25 11.215 25 25v222.73l-120 60V197c0-8.285-6.715-15-15-15H135c-8.285 0-15 6.715-15 15v95.73l-30-15V55c0-13.785 11.215-25 25-25zm155 257.973l-66.68-44.453a15.004 15.004 0 00-15.027-.938L150 261.73V212h120zm-120 7.297l43.922-21.961L270 324.027v28.703l-15 7.5-105-52.5zm-90-32.54l-19.676-9.84L60 233.216zM465 482H45c-8.27 0-15-6.73-15-15V281.27l218.293 109.148a15.008 15.008 0 0013.414 0L480 281.27V467c0 8.27-6.73 15-15 15zm0 0" />
                <path
                    d="M195 91h120c8.285 0 15-6.715 15-15s-6.715-15-15-15H195c-8.285 0-15 6.715-15 15s6.715 15 15 15zm0 0M135 151h240c8.285 0 15-6.715 15-15s-6.715-15-15-15H135c-8.285 0-15 6.715-15 15s6.715 15 15 15zm0 0M375 181h-30c-8.285 0-15 6.715-15 15s6.715 15 15 15h30c8.285 0 15-6.715 15-15s-6.715-15-15-15zm0 0M375 241h-30c-8.285 0-15 6.715-15 15s6.715 15 15 15h30c8.285 0 15-6.715 15-15s-6.715-15-15-15zm0 0" />
            </svg>
        </div>
        <h2 class="font-light text-xl mb-2 text-center pt-5 text-gray-900">Subscribe to our
            newsletter</h2>
        <span class="block text-center text-gray-900 font-thin tracking-wider leading-loose text-xs italic">Get
            the news right in your inbox!</span>
        <form action="">
            <input required type="text" id="name" placeholder="Full Name" name="name"
                class="w-full bg-white border border-ash-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 text-base outline-none text-ash-700 p-3 my-2 leading-8">
            <input required type="email" id="name" placeholder="Email Address" name="email"
                class="w-full bg-white border border-ash-300 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 text-base outline-none text-ash-700 p-3 my-2 leading-8">
            <div class="my-2 text-gray-900 font-thin tracking-wider leading-loose text-xs italic">
                <span class="inline-block pr-1">
                    <input type="checkbox" name="" id="privacy-check"
                        class="bg-white border-ash-300 text-orange-500 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50">
                </span>
                <label for="privacy-check">By checking this you agree to our <a href="" class="text-orange-500">Privacy
                        Policy</a>.</label>
            </div>
            <button type="submit"
                class="w-full rounded-sm bg-gray-600 hover:bg-ash-600 text-white tracking-widest text-sm uppercase font-medium py-3 mt-5">Subscribe</button>
        </form>
    </div>
</div>
