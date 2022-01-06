@props(['route', 'title'])

@php
$active = (request()->routeIs($route));
@endphp

<li @class(['px-3', 'py-2' , 'rounded-sm' , 'mb-0.5' , 'last:mb-0' , 'bg-ash-900'=> $active, 'hover:bg-ash-900'=> !$active]) class="">
    <a class="block text-ash-200 transition duration-150 hover:text-ash-200 active" href="{{ \Illuminate\Support\Facades\Route::has($route)? route($route) : 'javascript:void(0)' }}" style="outline: currentcolor none medium;">
        <div class="flex flex-grow items-center">
            <svg class="flex-shrink-0 h-5 w-5 mr-3" viewBox="0 0 45.532 45.532">
                <path @class(['fill-current', 'text-red-600'=> $active, 'text-ash-600' => !$active]) d="m22.766 1e-3c-12.572 0-22.766 10.192-22.766 22.765s10.193 22.765 22.766 22.765c12.574 0 22.766-10.192 22.766-22.765s-10.192-22.765-22.766-22.765z" />
                <path @class(['fill-current', 'text-red-200'=> $active, 'text-ash-400' => !$active]) d="m22.761 39.579c-4.149 0-7.949-1.511-10.88-4.012-0.714-0.609-1.126-1.502-1.126-2.439 0-4.217 3.413-7.592 7.631-7.592h8.762c4.219 0 7.619 3.375 7.619 7.592 0 0.938-0.41 1.829-1.125 2.438-2.93 2.502-6.731 4.013-10.881 4.013z" fill="#b3b3b3" />
                <path @class(['fill-current', 'text-red-200'=> $active, 'text-ash-400' => !$active]) d="m22.766 6.808c4.16 0 7.531 3.372 7.531 7.53 0 4.159-3.371 7.53-7.531 7.53-4.158 0-7.529-3.371-7.529-7.53 0-4.158 3.371-7.53 7.529-7.53z" fill="#b3b3b3" />
            </svg>
            <span class="text-md font-medium">{{$title}}</span>
        </div>
    </a>
</li>