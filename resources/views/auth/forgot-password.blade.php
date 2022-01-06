<x-auth-layout title="Forgot Password">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo theme="dark" class="w-32 h-32 fill-current text-black" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-ash-800">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <x-input-group id="email" placeholder="Email" class="@error('email') text-red @enderror" type="email" name="email" :value="old('email')" required autofocus>
                <x-slot name="icon">
                    <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-50 stroke-current">
                        <path d="m58.003 8h-52.007c-3.3137 0-6 2.6862-6 6v36c0 3.3137 2.6863 6 6 6h52.007c3.3137 0 6-2.6863 6-6v-36c9e-7 -3.3138-2.6863-6-6-6zm4 41.111-18.919-18.919 18.919-12.056v30.974zm-56.007-39.111h52.007c2.2056 0 4 1.7943 4 4v1.7664l-27.536 17.547c-1.4902 0.9493-3.3935 0.92-4.8496-0.070301l-27.622-18.774v-0.4695c0-2.2057 1.7945-4 4-4zm-4 6.8852 19.186 13.04-19.186 19.186v-32.226zm56.007 37.115h-52.007c-1.6474 0-3.0639-1.0021-3.6761-2.4279l20.52-20.52 5.6548 3.8434c1.0859 0.7383 2.3418 1.1084 3.5996 1.1084 1.1953 0 2.3925-0.334 3.4463-1.0049l5.8424-3.723 20.296 20.296c-0.6122 1.4258-2.0287 2.4279-3.6761 2.4279z" />
                    </svg>
                </x-slot>
            </x-input-group>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-auth-layout>
