<x-admin-layout title="{{ __('categories.create') }}">
    <x-admin.top-card title="Create a New Category 😎" subtitle="New category? Means you're expanding. Ride on!">
    </x-admin.top-card>
    <div class="grid grid-cols-12 gap-6">
        <div x-data="{ tab: 1 }" class="col-span-full bg-white shadow-lg rounded-sm border border-ash-200">
            <header class="px-5 py-2 border-b border-ash-100">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg">{{ __('categories.create') }}</h2>
                </div>
            </header>
            <div class="">
                <form class="px-5 py-2" enctype="multipart/form-data"
                    action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mt-4 text-gray-700">
                        <div class="py-2">
                            <label class="font-medium" for="name">Name</label>
                            <input required type="text" name="name" value="{{ old('name') }}"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded focus:border-blue-500 focus:ring-0 focus:outline-none">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </x-app-layout>
