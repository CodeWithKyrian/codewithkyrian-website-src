<x-auth-layout title="Enter Access Pin to Continue">
    <x-auth-card>

        <div onclick="document.getElementById('logout-form').submit();" class="absolute top-4 left-4">
            <button class="inline-flex items-center px-4 py-2 bg-ash-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-ash-900 focus:outline-none focus:border-ash-900 focus:ring ring-ash-500">
                Logout
            </button>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <x-slot name="logo">
            <img src="{{ auth()->user()->profile_img ?? asset('img/avatar.svg') }}" alt="User Image" class="w-32 h-full rounded-md mb-2">
        </x-slot>

        <div class="text-center">
            <div class="mb-1 text-lg font-bold text-ash-700">Welcome Back,</div>
            <div class="mb-2 text-lg font-bold text-red-500">{{auth()->user()->name}}</div>
            <div class="mb-4 text-sm font-semibold text-ash-700">Enter Account Pin to Proceed</div>
        </div>

        <form x-data="form()" @submit.prevent="submit()" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <div class="flex w-full items-center bg-ash-200 rounded overflow-hidden p-2">
                    <svg viewBox="0 0 485 485" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-30 stroke-current">
                        <path d="m242.5 253.93c-19.299 0-35 15.701-35 35 0 13.934 8.186 25.989 20 31.616v53.568h30v-53.569c11.814-5.628 20-17.682 20-31.616 0-19.298-15.701-34.999-35-34.999z" />
                        <path d="m345 173.84v-71.344c0-56.519-45.981-102.5-102.5-102.5s-102.5 45.981-102.5 102.5v71.344c-42.438 31.455-70 81.895-70 138.66 0 95.117 77.383 172.5 172.5 172.5s172.5-77.383 172.5-172.5c0-56.761-27.562-107.2-70-138.66zm-175-71.344c0-39.977 32.523-72.5 72.5-72.5s72.5 32.523 72.5 72.5v53.498c-22.054-10.257-46.618-15.998-72.5-15.998s-50.446 5.741-72.5 15.999v-53.499zm72.5 352.5c-78.575 0-142.5-63.925-142.5-142.5s63.925-142.5 142.5-142.5 142.5 63.925 142.5 142.5-63.925 142.5-142.5 142.5z" />
                    </svg>
                    <input name="account_pin" x-model="account_pin" placeholder="Account PIN" :type="view ? 'text' : 'password'" required class="bg-transparent w-full focus:shadow-none focus:ring-0 outline-none focus:outline-none focus:border-0 border-0 placeholder-ash-500" />
                    <svg x-show="error" x-cloak class="h-6 w-6 m-2 fill-current text-red-500" viewBox="0 0 295.43 295.43" xmlns="http://www.w3.org/2000/svg">
                        <path d="m147.71 0c-81.45 0-147.71 66.264-147.71 147.71s66.264 147.71 147.71 147.71 147.71-66.264 147.71-147.71-66.264-147.71-147.71-147.71zm0 265.43c-64.907 0-117.71-52.807-117.71-117.71s52.807-117.71 117.71-117.71 117.71 52.807 117.71 117.71-52.807 117.71-117.71 117.71z" />
                        <path d="m147.71 61.68c-8.284 0-15 6.716-15 15v79c0 8.284 6.716 15 15 15s15-6.716 15-15v-79c0-8.284-6.716-15-15-15z" />
                        <circle cx="147.71" cy="217.68" r="15" />
                    </svg>
                    <div class="cursor-pointer" @click="view = !view">
                        <svg x-show="view" class="w-6 h-6 text-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.09756 12C8.09756 14.1333 9.8439 15.8691 12 15.8691C14.1463 15.8691 15.8927 14.1333 15.8927 12C15.8927 9.85697 14.1463 8.12121 12 8.12121C9.8439 8.12121 8.09756 9.85697 8.09756 12ZM17.7366 6.04606C19.4439 7.36485 20.8976 9.29455 21.9415 11.7091C22.0195 11.8933 22.0195 12.1067 21.9415 12.2812C19.8537 17.1103 16.1366 20 12 20H11.9902C7.86341 20 4.14634 17.1103 2.05854 12.2812C1.98049 12.1067 1.98049 11.8933 2.05854 11.7091C4.14634 6.88 7.86341 4 11.9902 4H12C14.0683 4 16.0293 4.71758 17.7366 6.04606ZM12.0012 14.4124C13.3378 14.4124 14.4304 13.3264 14.4304 11.9979C14.4304 10.6597 13.3378 9.57362 12.0012 9.57362C11.8841 9.57362 11.767 9.58332 11.6597 9.60272C11.6207 10.6694 10.7426 11.5227 9.65971 11.5227H9.61093C9.58166 11.6779 9.56215 11.833 9.56215 11.9979C9.56215 13.3264 10.6548 14.4124 12.0012 14.4124Z" fill="currentColor" />
                        </svg>
                        <svg x-show="!view" class="w-6 h-6 text-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.80327 15.2526C10.4277 15.6759 11.1888 15.9319 11.9987 15.9319C14.1453 15.9319 15.8919 14.1696 15.8919 12.0037C15.8919 11.1866 15.6382 10.4186 15.2186 9.78855L14.1551 10.8617C14.3307 11.1964 14.4283 11.5902 14.4283 12.0037C14.4283 13.3525 13.3354 14.4551 11.9987 14.4551C11.5889 14.4551 11.1986 14.3567 10.8668 14.1795L9.80327 15.2526ZM18.4288 6.54952C19.8436 7.84907 21.0438 9.60149 21.9415 11.7083C22.0195 11.8954 22.0195 12.112 21.9415 12.2892C19.8534 17.1921 16.1358 20.1259 11.9987 20.1259H11.9889C10.1058 20.1259 8.30063 19.5056 6.71018 18.3735L4.81725 20.2834C4.67089 20.4311 4.4855 20.5 4.30011 20.5C4.11472 20.5 3.91957 20.4311 3.78297 20.2834C3.53903 20.0373 3.5 19.6435 3.69515 19.358L3.72442 19.3186L18.1556 4.75771C18.1751 4.73802 18.1946 4.71833 18.2044 4.69864L18.2044 4.69863C18.2239 4.67894 18.2434 4.65925 18.2532 4.63957L19.1704 3.71413C19.4631 3.42862 19.9217 3.42862 20.2046 3.71413C20.4974 3.99964 20.4974 4.4722 20.2046 4.75771L18.4288 6.54952ZM8.09836 12.0075C8.09836 12.2635 8.12764 12.5195 8.16667 12.7558L4.55643 16.3984C3.5807 15.2564 2.7318 13.8781 2.05854 12.293C1.98049 12.1158 1.98049 11.8992 2.05854 11.7122C4.14662 6.80933 7.86419 3.88534 11.9916 3.88534H12.0013C13.3966 3.88534 14.7529 4.22007 16.0018 4.85015L12.7429 8.13841C12.5087 8.09903 12.255 8.0695 12.0013 8.0695C9.84494 8.0695 8.09836 9.83177 8.09836 12.0075Z" fill="currentColor" />
                        </svg>
                    </div>
                </div>
                <p x-show="error" x-cloak x-text="error_msg" class="text-red-500 text-sm"></p>
            </div>

            <div class="flex justify-end mt-4">
                <button :disabled="loading" type="submit" class="h-10 w-[140px] flex items-center justify-center py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest active:hover:bg-red-600 disabled:opacity-25 transition ease-in-out duration-150">
                    <span x-show="!loading"> {{ __('Confirm Login') }} </span>
                    <svg x-cloak x-show="loading" class="w-6 h-6 animate-spin" viewBox="0 0 41.647 41.647">
                        <defs>
                            <linearGradient id="linearGradient984" x1="89.53" x2="131.18" y1="135.56" y2="135.56" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#fff" offset="0" />
                                <stop stop-color="#999" offset="1" />
                            </linearGradient>
                        </defs>
                        <g transform="translate(-89.53 -114.73)">
                            <circle cx="110.35" cy="135.56" r="19.073" fill="none" stroke="url(#linearGradient984)" stroke-width="3.5" />
                        </g>
                    </svg>
                </button>
            </div>
            <div class="flex justify-end mt-4">

            </div>
        </form>
    </x-auth-card>

    <script>
        function form() {
            return {
                loading: false,
                error: false,
                view: false,
                error_msg: '',
                account_pin: '',

                submit() {
                    this.loading = true
                    const route = '<?= route('password.confirm') ?>'
                    axios.post(route, {
                            account_pin: this.account_pin
                        }).then(({
                            data
                        }) => {
                            if (data.status) {
                                setTimeout(() => {
                                    window.location.assign('/user/dashboard')
                                }, 2500);
                            } else {
                                this.error = true
                                this.error_msg = data.message
                                this.loading = false
                            }
                        })
                        .catch(() => this.loading = false)
                }
            }
        }
    </script>
</x-auth-layout>