<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | CodeWithKyrian</title>
    <meta name="author" content="Kyrian Obikwelu">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="font-sans">
    <div class="font-sans text-gray-700 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center px-4 items-center pt-6 sm:pt-0 bg-gray-100">


            <div class="w-full sm:max-w-md mt-6 p-6 bg-gray-100 overflow-hidden rounded-lg relative">
                <div class="flex items-center flex-col">
                    <div class="mb-4">
                        <a href="{{ route('home') }}"
                            class="text-xl font-bold text-gray-800 md:text-2xl">CodeWithKyrian</a>
                    </div>
                    <p class="text-lg text-center uppercase font-bold mb-8">Login to CodeWithKyrian</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <x-auth.input-group id="email" placeholder="Email" class=""
                        type="email" name="email" :value="old('email')" required autofocus>
                        <x-slot name="icon">
                            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 m-2 opacity-50 stroke-current">
                                <path
                                    d="m58.003 8h-52.007c-3.3137 0-6 2.6862-6 6v36c0 3.3137 2.6863 6 6 6h52.007c3.3137 0 6-2.6863 6-6v-36c9e-7 -3.3138-2.6863-6-6-6zm4 41.111-18.919-18.919 18.919-12.056v30.974zm-56.007-39.111h52.007c2.2056 0 4 1.7943 4 4v1.7664l-27.536 17.547c-1.4902 0.9493-3.3935 0.92-4.8496-0.070301l-27.622-18.774v-0.4695c0-2.2057 1.7945-4 4-4zm-4 6.8852 19.186 13.04-19.186 19.186v-32.226zm56.007 37.115h-52.007c-1.6474 0-3.0639-1.0021-3.6761-2.4279l20.52-20.52 5.6548 3.8434c1.0859 0.7383 2.3418 1.1084 3.5996 1.1084 1.1953 0 2.3925-0.334 3.4463-1.0049l5.8424-3.723 20.296 20.296c-0.6122 1.4258-2.0287 2.4279-3.6761 2.4279z" />
                            </svg>
                        </x-slot>
                    </x-auth.input-group>
    
                    <x-auth.password></x-auth.password>
    
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded  border-gray-300 text-blue-500 shadow-sm focus:border-blue-500 focus:ring-0"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="text-sm text-gray-600 hover:text-gray-700 mt-4">
                        <a class="underline text-blue-500" href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="text-sm text-gray-600 hover:text-gray-700">
                            Not a member? <a class="underline text-blue-500" href="{{ route('register') }}">
                                {{ __('Sign Up Now') }}
                            </a>
                        </div>
    
    
                        <x-general.button class="ml-3">
                            {{ __('Log in') }}
                        </x-general.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/admin.js') }}"></script>
</body>

</html>
