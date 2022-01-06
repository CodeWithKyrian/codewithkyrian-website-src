@props(['route', 'title'])

@php
$active = (request()->routeIs($route));
@endphp

<li @class(['px-3', 'py-2' , 'rounded-sm' , 'mb-0.5' , 'last:mb-0' , 'bg-ash-900'=> $active, 'hover:bg-ash-900'=> !$active]) class="">
    <a class="block text-ash-200 transition duration-150 hover:text-ash-200 active" href="{{ \Illuminate\Support\Facades\Route::has($route)? route($route) : 'javascript:void(0)' }}" style="outline: currentcolor none medium;">
        <div class="flex flex-grow items-center">
            <svg class="flex-shrink-0 h-5 w-5 mr-3" viewBox="0 0 18 18">
                <path @class(['fill-current', 'text-red-600'=> $active, 'text-ash-600' => !$active]) d="M17 10a8 8 0 0 1-16 0 1 1 0 0 1 2 0 6 6 0 1 0 6.5-5.98V5.5a.477.477 0 0 1-.27.44A.466.466 0 0 1 9 6a.52.52 0 0 1-.29-.09l-3.5-2.5a.505.505 0 0 1 0-.82l3.5-2.5a.488.488 0 0 1 .52-.03.477.477 0 0 1 .27.44v1.52A7.987 7.987 0 0 1 17 10z"/>
                <path @class(['fill-current', 'text-red-200'=> $active, 'text-ash-400' => !$active]) d="M11.71 8.71L10 10.42V13a1 1 0 0 1-2 0v-3a.69.69 0 0 1 .04-.25.37.37 0 0 1 .04-.14.988.988 0 0 1 .21-.32l2-2a1.004 1.004 0 0 1 1.42 1.42z" />
            </svg>
            <span class="text-md font-medium">{{$title}}</span>
        </div>
    </a>
</li>