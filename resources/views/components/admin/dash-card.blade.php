@props(['title', 'count', 'percent'])
<div
    class="flex flex-col col-span-full sm:col-span-6 md:col-span-4 bg-white shadow-sm rounded-sm border border-gray-200 p-4">
    <div class="flex flex-col">
        <div class="flex space-x-8 w-56">
            <div class="">
                <div class="uppercase text-sm text-gray-400">
                    {{ $title }}
                </div>
                <div class="mt-1">
                    <div class="flex space-x-2 items-center">
                        <div class="text-3xl">
                            {{ $count }}
                        </div>
                        <div
                            class="text-xs {{ $percent > 0 ? 'text-green-500 bg-green-200' : 'text-red-500 bg-red-200' }} rounded-md p-1">
                            {{ $percent }}%
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                {{ $icon }}
            </div>
        </div>
    </div>
</div>
