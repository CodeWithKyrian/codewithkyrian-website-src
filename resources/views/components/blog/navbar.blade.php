<fixed-header>
    <nav class="px-6 py-4 bg-white shadow z-50 w-full">
        <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img class="w-8 h-auto" src="{{ asset('img/icon.png') }}" alt="">
                    <div class="text-xl ml-2 font-bold text-gray-800 md:text-2xl">CodeWithKyrian</div>
                </a>
                <div>
                    <label for="menu-toggle"
                        class="block text-gray-800 hover:text-gray-600 focus:text-gray-600 focus:outline-none md:hidden cursor-pointer">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </label>
                </div>
            </div>
            <input class="hidden" type="checkbox" id="menu-toggle" />
            <div id="menu" class="flex-col hidden md:flex md:flex-row md:-mx-4 pt-4 md:pt-0">
                {{-- <a href="#" class="my-2 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Home</a> --}}
                <a href="#" class="my-2 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Posts</a>
                <a href="{{ route('about') }}" class="my-2 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">About
                    us</a>
                @admin
                <a href="{{ route('admin.dashboard') }}"
                    class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Dashboard</a>
                @endadmin
            </div>
        </div>
    </nav>
</fixed-header>
