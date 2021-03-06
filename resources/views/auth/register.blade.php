<x-auth-layout title="Register">
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo theme="dark" class="w-32 h-32 fill-current text-black" />
            </a>
            <p class="text-lg text-center uppercase font-bold mb-8">Register with {{config('app.name', 'Laravel')}}</p>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-input-group id="name" placeholder="Full Name" class="@error('name') text-red @enderror" type="text" name="name" :value="old('name')" required autofocus>
                <x-slot name="icon">
                    <svg viewBox="0 0 459.86 459.86" class="h-6 w-6 m-2 opacity-50 stroke-current" xmlns="http://www.w3.org/2000/svg">
                        <path d="m395.99 193.98c-6.215 8.338-13.329 15.721-21.13 21.941 33.044 21.079 55.005 58.06 55.005 100.08 0 13.638-20.011 23.042-31.938 27.434-9.301 3.425-20.237 6.229-32.19 8.347 0.387 5.05 0.586 10.153 0.586 15.3 0 4.455-0.389 9.647-1.518 15.299 16.064-2.497 30.815-6.128 43.488-10.794 42.626-15.694 51.573-38.891 51.573-55.586-1e-3 -50.476-25.299-95.146-63.876-122.02z" />
                        <path d="m311.24 15.147c-18.734 0-36.411 7.436-50.724 21.145 5.632 7.212 10.553 15.004 14.733 23.246 9.592-10.94 22.195-17.602 35.991-17.602 29.955 0 54.325 31.352 54.325 69.888s-24.37 69.888-54.325 69.888c-9.01 0-17.507-2.853-24.995-7.868-2.432 8.863-5.627 17.42-9.53 25.565 10.642 5.952 22.36 9.093 34.525 9.093 45.83 0 81.115-44.3 81.115-96.678 0-52.383-35.29-96.677-81.115-96.677z" />
                        <path d="m260 226.28c-6.487 8.205-13.385 15.089-20.57 20.892 40.84 24.367 68.257 68.991 68.257 119.9 0 17.196-24.104 28.639-38.472 33.929-26.025 9.583-62.857 15.078-101.05 15.078s-75.029-5.495-101.05-15.078c-14.368-5.29-38.472-16.732-38.472-33.929 0-50.914 27.417-95.538 68.257-119.9-7.184-5.802-14.083-12.687-20.57-20.892-45.919 30.055-76.322 81.938-76.322 140.8 0 18.127 9.926 43.389 57.213 60.8 29.496 10.861 68.898 16.841 110.95 16.841s81.451-5.98 110.95-16.841c47.287-17.411 57.213-42.673 57.213-60.8 0-58.859-30.402-110.74-76.321-140.8z" />
                        <path d="m168.16 242.76c53.003 0 93.806-51.234 93.806-111.8 0-60.571-40.808-111.8-93.806-111.8-52.995 0-93.806 51.223-93.806 111.8 0 60.582 40.815 111.8 93.806 111.8zm0-194.97c35.936 0 65.171 37.31 65.171 83.169s-29.236 83.169-65.171 83.169-65.171-37.31-65.171-83.169 29.236-83.169 65.171-83.169z" />
                    </svg>
                </x-slot>
            </x-input-group>

            <x-input-group id="email" placeholder="Email" class="@error('email') text-red @enderror" type="email" name="email" :value="old('email')" required>
                <x-slot name="icon">
                    <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-50 stroke-current">
                        <path d="m58.003 8h-52.007c-3.3137 0-6 2.6862-6 6v36c0 3.3137 2.6863 6 6 6h52.007c3.3137 0 6-2.6863 6-6v-36c9e-7 -3.3138-2.6863-6-6-6zm4 41.111-18.919-18.919 18.919-12.056v30.974zm-56.007-39.111h52.007c2.2056 0 4 1.7943 4 4v1.7664l-27.536 17.547c-1.4902 0.9493-3.3935 0.92-4.8496-0.070301l-27.622-18.774v-0.4695c0-2.2057 1.7945-4 4-4zm-4 6.8852 19.186 13.04-19.186 19.186v-32.226zm56.007 37.115h-52.007c-1.6474 0-3.0639-1.0021-3.6761-2.4279l20.52-20.52 5.6548 3.8434c1.0859 0.7383 2.3418 1.1084 3.5996 1.1084 1.1953 0 2.3925-0.334 3.4463-1.0049l5.8424-3.723 20.296 20.296c-0.6122 1.4258-2.0287 2.4279-3.6761 2.4279z" />
                    </svg>
                </x-slot>
            </x-input-group>

            <x-input-group id="phone" placeholder="Phone Number" class="@error('phone') text-red @enderror" type="text" name="phone" :value="old('phone')" required>
                <x-slot name="icon">
                    <svg stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="none" class="h-6 w-6 m-2 opacity-30 stroke-current" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="m3 12c0-7 7-7 13-7s13 0 13 7c0 8-7-1-7-1h-12s-7 9-7 1zm8 2s-5 5-5 14h20c0-9-5-14-5-14h-10z" />
                        <circle cx="16" cy="21" r="4" />
                    </svg>
                </x-slot>
            </x-input-group>
                        
            <x-select-group id="gender" text="Select Gender" name="gender" required>
                <x-slot name="icon">
                    <svg viewBox="0 0 485 485" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-30 stroke-current">
                        <path d="m242.5 253.93c-19.299 0-35 15.701-35 35 0 13.934 8.186 25.989 20 31.616v53.568h30v-53.569c11.814-5.628 20-17.682 20-31.616 0-19.298-15.701-34.999-35-34.999z" />
                        <path d="m345 173.84v-71.344c0-56.519-45.981-102.5-102.5-102.5s-102.5 45.981-102.5 102.5v71.344c-42.438 31.455-70 81.895-70 138.66 0 95.117 77.383 172.5 172.5 172.5s172.5-77.383 172.5-172.5c0-56.761-27.562-107.2-70-138.66zm-175-71.344c0-39.977 32.523-72.5 72.5-72.5s72.5 32.523 72.5 72.5v53.498c-22.054-10.257-46.618-15.998-72.5-15.998s-50.446 5.741-72.5 15.999v-53.499zm72.5 352.5c-78.575 0-142.5-63.925-142.5-142.5s63.925-142.5 142.5-142.5 142.5 63.925 142.5 142.5-63.925 142.5-142.5 142.5z" />
                    </svg>
                </x-slot>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </x-select-group>

            <x-select-group id="country" text="Select Country" name="country" required>
                <x-slot name="icon">
                    <svg viewBox="0 0 485 485" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-30 stroke-current">
                        <path d="m242.5 253.93c-19.299 0-35 15.701-35 35 0 13.934 8.186 25.989 20 31.616v53.568h30v-53.569c11.814-5.628 20-17.682 20-31.616 0-19.298-15.701-34.999-35-34.999z" />
                        <path d="m345 173.84v-71.344c0-56.519-45.981-102.5-102.5-102.5s-102.5 45.981-102.5 102.5v71.344c-42.438 31.455-70 81.895-70 138.66 0 95.117 77.383 172.5 172.5 172.5s172.5-77.383 172.5-172.5c0-56.761-27.562-107.2-70-138.66zm-175-71.344c0-39.977 32.523-72.5 72.5-72.5s72.5 32.523 72.5 72.5v53.498c-22.054-10.257-46.618-15.998-72.5-15.998s-50.446 5.741-72.5 15.999v-53.499zm72.5 352.5c-78.575 0-142.5-63.925-142.5-142.5s63.925-142.5 142.5-142.5 142.5 63.925 142.5 142.5-63.925 142.5-142.5 142.5z" />
                    </svg>
                </x-slot>
                @foreach($countries as $country)
                <option value="{{$country}}">{{$country}}</option>
                @endforeach
            </x-select-group>

            <x-input-group id="password" placeholder="Password" type="password" name="password" required autocomplete="current-password">
                <x-slot name="icon">
                    <svg viewBox="0 0 485 485" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-30 stroke-current">
                        <path d="m242.5 253.93c-19.299 0-35 15.701-35 35 0 13.934 8.186 25.989 20 31.616v53.568h30v-53.569c11.814-5.628 20-17.682 20-31.616 0-19.298-15.701-34.999-35-34.999z" />
                        <path d="m345 173.84v-71.344c0-56.519-45.981-102.5-102.5-102.5s-102.5 45.981-102.5 102.5v71.344c-42.438 31.455-70 81.895-70 138.66 0 95.117 77.383 172.5 172.5 172.5s172.5-77.383 172.5-172.5c0-56.761-27.562-107.2-70-138.66zm-175-71.344c0-39.977 32.523-72.5 72.5-72.5s72.5 32.523 72.5 72.5v53.498c-22.054-10.257-46.618-15.998-72.5-15.998s-50.446 5.741-72.5 15.999v-53.499zm72.5 352.5c-78.575 0-142.5-63.925-142.5-142.5s63.925-142.5 142.5-142.5 142.5 63.925 142.5 142.5-63.925 142.5-142.5 142.5z" />
                    </svg>
                </x-slot>
            </x-input-group>

            <x-input-group id="confirm_password" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="current-password">
                <x-slot name="icon">
                    <svg viewBox="0 0 485 485" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 opacity-30 stroke-current">
                        <path d="m242.5 253.93c-19.299 0-35 15.701-35 35 0 13.934 8.186 25.989 20 31.616v53.568h30v-53.569c11.814-5.628 20-17.682 20-31.616 0-19.298-15.701-34.999-35-34.999z" />
                        <path d="m345 173.84v-71.344c0-56.519-45.981-102.5-102.5-102.5s-102.5 45.981-102.5 102.5v71.344c-42.438 31.455-70 81.895-70 138.66 0 95.117 77.383 172.5 172.5 172.5s172.5-77.383 172.5-172.5c0-56.761-27.562-107.2-70-138.66zm-175-71.344c0-39.977 32.523-72.5 72.5-72.5s72.5 32.523 72.5 72.5v53.498c-22.054-10.257-46.618-15.998-72.5-15.998s-50.446 5.741-72.5 15.999v-53.499zm72.5 352.5c-78.575 0-142.5-63.925-142.5-142.5s63.925-142.5 142.5-142.5 142.5 63.925 142.5 142.5-63.925 142.5-142.5 142.5z" />
                    </svg>
                </x-slot>
            </x-input-group>

            <div class="flex items-center justify-between mt-8">
                <div class="text-sm text-ash-600 hover:text-ash-700">
                    Already a member? <a class="underline text-red-500" href="{{ route('login') }}">
                        {{ __('Login Now') }}
                    </a>
                </div>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-auth-layout>