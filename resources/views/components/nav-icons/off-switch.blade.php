@props(['route', 'title'])

@php
$active = (request()->routeIs($route));
@endphp

<li @class(['px-3', 'py-2' , 'rounded-sm' , 'mb-0.5' , 'last:mb-0' , 'bg-ash-900'=> $active, 'hover:bg-ash-900'=> !$active]) class="">
    <a class="block text-ash-200 transition duration-150 hover:text-ash-200 active" {{ $attributes->merge() }} href="{{ \Illuminate\Support\Facades\Route::has($route)? route($route) : 'javascript:void(0)' }}" style="outline: currentcolor none medium;">
        <div class="flex flex-grow items-center">
            <svg class="flex-shrink-0 h-5 w-5 mr-3" viewBox="0 0 488.23 530.89">
                <path @class(['fill-current', 'text-red-600'=> $active, 'text-ash-600' => !$active]) d="m341.67 50.943c-11.997-0.15344-23.448 6.7619-28.566 18.479-6.8254 15.623 0.26255 33.706 15.885 40.531 65.962 28.817 109.56 94.123 109.56 167.38 0 100.77-81.79 182.55-182.55 182.55-100.78 0-182.55-81.775-182.55-182.55 0-73.238 43.586-138.54 109.53-167.38 15.621-6.83 22.702-24.918 15.871-40.537-5.0861-11.632-16.536-18.599-28.584-18.453-4.0154 0.04854-8.0743 0.8846-11.951 2.5801-88.212 38.572-146.43 125.86-146.43 223.79 0 134.87 109.25 244.12 244.12 244.12 134.86 0 244.12-109.25 244.12-244.12 0-97.974-58.213-185.23-146.48-223.79-3.9057-1.7063-7.9659-2.5426-11.965-2.5938z" />
                <path @class(['fill-current', 'text-red-200'=> $active, 'text-ash-400' => !$active]) d="m255.99-9.4492c-17.047 0-30.781 13.734-30.781 30.781v192c0 17.047 13.732 30.785 30.781 30.785 17.049 0 30.783-13.735 30.783-30.783v-192c1e-3 -17.05-13.735-30.783-30.783-30.783z" />
            </svg>
            <span class="text-md font-medium">{{$title}}</span>
        </div>
    </a>
</li>