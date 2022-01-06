@props(['route', 'title'])

@php
$active = (request()->routeIs($route));
@endphp

<li @class(['px-3', 'py-2' , 'rounded-sm' , 'mb-0.5' , 'last:mb-0' , 'bg-ash-900'=> $active, 'hover:bg-ash-900'=> !$active]) class="">
    <a class="block text-ash-200 transition duration-150 hover:text-ash-200 active" href="{{ \Illuminate\Support\Facades\Route::has($route)? route($route) : 'javascript:void(0)' }}" style="outline: currentcolor none medium;">
        <div class="flex flex-grow items-center">
            <svg class="flex-shrink-0 h-5 w-5 mr-3" viewBox="0 0 24 24">
                <path @class(['fill-current', 'text-red-200'=> $active, 'text-ash-400' => !$active]) d="M7 0l6 7H8v10H6V7H1z"></path>
                <path @class(['fill-current', 'text-red-600'=> $active, 'text-ash-600' => !$active]) d="M18 7v10h5l-6 7-6-7h5V7z"></path>
            </svg>
            <span class="text-md font-medium">{{$title}}</span>
        </div>
    </a>
</li>