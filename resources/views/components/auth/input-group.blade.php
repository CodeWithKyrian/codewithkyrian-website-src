@props(['disabled' => false, 'name'])

<div class="mb-4">
    <div class="flex w-full items-center bg-gray-200 rounded overflow-hidden p-2">
        {{ $icon }}
        <input name="{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-transparent w-full focus:shadow-none focus:ring-0 outline-none focus:outline-none focus:border-0 border-0 placeholder-gray-500']) !!} />
        @error($name)
        <svg class="h-6 w-6 m-2 fill-current text-red-500" viewBox="0 0 295.43 295.43" xmlns="http://www.w3.org/2000/svg">
            <path d="m147.71 0c-81.45 0-147.71 66.264-147.71 147.71s66.264 147.71 147.71 147.71 147.71-66.264 147.71-147.71-66.264-147.71-147.71-147.71zm0 265.43c-64.907 0-117.71-52.807-117.71-117.71s52.807-117.71 117.71-117.71 117.71 52.807 117.71 117.71-52.807 117.71-117.71 117.71z" />
            <path d="m147.71 61.68c-8.284 0-15 6.716-15 15v79c0 8.284 6.716 15 15 15s15-6.716 15-15v-79c0-8.284-6.716-15-15-15z" />
            <circle cx="147.71" cy="217.68" r="15" />
        </svg>
        @enderror
    </div>
    @error($name)
    <p class="text-red-500 text-sm">{{$message}}</p>
    @enderror
</div>