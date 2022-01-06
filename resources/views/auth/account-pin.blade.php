<x-auth-layout title="Create Account PIN">
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
            <div class="mb-4 text-sm font-semibold text-ash-700">Create Account PIN to continue</div>
        </div>

        <form method="POST" action="{{ route('account-pin.create') }}">
            @csrf

            <x-input-group id="account_pin" placeholder="Account PIN" type="password" name="account_pin" required autocomplete="current-password">
                <x-slot name="icon">
                    <svg viewBox="0 0 485 485" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-30 stroke-current">
                        <path d="m242.5 253.93c-19.299 0-35 15.701-35 35 0 13.934 8.186 25.989 20 31.616v53.568h30v-53.569c11.814-5.628 20-17.682 20-31.616 0-19.298-15.701-34.999-35-34.999z" />
                        <path d="m345 173.84v-71.344c0-56.519-45.981-102.5-102.5-102.5s-102.5 45.981-102.5 102.5v71.344c-42.438 31.455-70 81.895-70 138.66 0 95.117 77.383 172.5 172.5 172.5s172.5-77.383 172.5-172.5c0-56.761-27.562-107.2-70-138.66zm-175-71.344c0-39.977 32.523-72.5 72.5-72.5s72.5 32.523 72.5 72.5v53.498c-22.054-10.257-46.618-15.998-72.5-15.998s-50.446 5.741-72.5 15.999v-53.499zm72.5 352.5c-78.575 0-142.5-63.925-142.5-142.5s63.925-142.5 142.5-142.5 142.5 63.925 142.5 142.5-63.925 142.5-142.5 142.5z" />
                    </svg>
                </x-slot>
            </x-input-group>

            <x-input-group id="account_pin_confirmation" placeholder="Confirm account PIN" type="password" name="account_pin_confirmation" required autocomplete="current-password">
                <x-slot name="icon">
                    <svg viewBox="0 0 485 485" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-30 stroke-current">
                        <path d="m242.5 253.93c-19.299 0-35 15.701-35 35 0 13.934 8.186 25.989 20 31.616v53.568h30v-53.569c11.814-5.628 20-17.682 20-31.616 0-19.298-15.701-34.999-35-34.999z" />
                        <path d="m345 173.84v-71.344c0-56.519-45.981-102.5-102.5-102.5s-102.5 45.981-102.5 102.5v71.344c-42.438 31.455-70 81.895-70 138.66 0 95.117 77.383 172.5 172.5 172.5s172.5-77.383 172.5-172.5c0-56.761-27.562-107.2-70-138.66zm-175-71.344c0-39.977 32.523-72.5 72.5-72.5s72.5 32.523 72.5 72.5v53.498c-22.054-10.257-46.618-15.998-72.5-15.998s-50.446 5.741-72.5 15.999v-53.499zm72.5 352.5c-78.575 0-142.5-63.925-142.5-142.5s63.925-142.5 142.5-142.5 142.5 63.925 142.5 142.5-63.925 142.5-142.5 142.5z" />
                    </svg>
                </x-slot>
            </x-input-group>

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
</x-auth-layout>