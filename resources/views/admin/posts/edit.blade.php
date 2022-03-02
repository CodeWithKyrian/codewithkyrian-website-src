<x-admin-layout title="Edit Post">
    <x-admin.top-card title="Edit Blog Post 😎"
        subtitle="Alright, it's time to get creative. Edit this to something more intersting!">
    </x-admin.top-card>
    <div class="grid grid-cols-12 gap-6">
        <div x-data="{ tab: 1 }" class="col-span-full bg-white shadow-lg rounded-sm border border-ash-200">
            <header class="px-5 py-2 border-b border-ash-100">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg">Edit Post</h2>
                </div>
            </header>
            <div class="">
                <form class="px-5 py-2" enctype="multipart/form-data"
                    action="{{ route('admin.posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4 text-gray-700" x-data="showImage()">
                        <div class="py-2">
                            <label class="font-medium" for="title">Title</label>
                            <input required type="text" name="title" value="{{ $post->title }}"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded focus:border-blue-500 focus:ring-0 focus:outline-none">
                        </div>
                        <div class="py-2">
                            <label class="font-medium" for="description">Description</label>
                            <textarea required rows="2" name="description"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded focus:border-blue-500 focus:ring-0 focus:outline-none">{{ $post->description }}</textarea>
                        </div>
                        <div class="py-2">
                            <label class="font-medium" for="banner">Banner</label>
                            <div class=" md:w-2/3 mx-auto">
                                <div class="flex items-center justify-center w-full mx-auto pb-[56.25%] relative mt-2">
                                    <div class="absolute inset-0 overflow-hidden">
                                        <label for="banner"
                                            class="flex flex-col items-center justify-center w-full h-full border-2 border-ash-500 rounded border-dashed hover:bg-ash-200 hover:border-ash-600">
                                            <img id="preview" src="{{ $post->getFirstMediaUrl('banner') }}"
                                                class="absolute object-cover w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-12 h-12 text-gray-400 group-hover:text-gray-600"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <p
                                                class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                Select a photo</p>
                                        </label>
                                        <input type="file" class="hidden" id="banner" name="banner"
                                            accept="image/*" @change="showPreview(event)" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="flex">
                                <label for="is_draft" class="w-1/5">
                                    <div class="font-medium">Save as Draft
                                    </div>
                                    <div class="relative  my-2">
                                        <input id="is_draft" @if (!$post->posted_at) checked @endif
                                            type="checkbox" type="checkbox" name="featured" class="hidden peer"
                                            x-model="is_draft" />
                                        <div
                                            class="bg-gray-200 w-20 h-10 rounded-full shadow-inner transition-all duration-300 ease-in-out peer-checked:bg-blue-500">
                                        </div>
                                        <div
                                            class="absolute top-1 left-1 w-8 h-8 bg-white rounded-full shadow transition-transform duration-300 inset-y-0 peer-checked:translate-x-[120%]">
                                        </div>
                                    </div>
                                </label>
                                <div class="w-2/5 px-2" x-show="!is_draft">
                                    <label class="font-medium" for="posted_at">Posted At</label>
                                    <input type="text" name="posted_at" value="{{ $post->posted_at }}"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded focus:border-blue-500 focus:ring-0 focus:outline-none">
                                </div>
                                <div class="w-2/5 px-2">
                                    <label class="font-medium" for="posted_at">Category</label>
                                    <select name="category_id"
                                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded focus:border-blue-500 focus:ring-0 focus:outline-none">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="py-2">
                            <label class="font-medium" for="content">Content</label>
                            <textarea id="editor" name="content"
                                class="prose block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded focus:border-blue-500 focus:ring-0 focus:outline-none">{{ $post->content }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('alpine')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('showImage', () => ({
                    is_draft: false,
                    showPreview(event) {
                        if (event.target.files.length > 0) {
                            var src = URL.createObjectURL(event.target.files[0]);
                            var preview = document.getElementById("preview");
                            preview.src = src;
                            preview.style.display = "block";
                        }
                    }
                }))
            })
        </script>
    @endpush
    @push('inline-scripts')
        {{-- <script src="{{ asset('js/ckeditor.js') }}"></script> --}}
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


        <script>
            tinymce.init({
                selector: '#editor',
                height: 350,
                plugins: [
                    'advlist codesample autolink link image lists charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'table emoticons template paste help'
                ],
                toolbar: 'code codesample | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                    'forecolor backcolor emoticons | help',
                codesample_languages: [{
                        text: 'HTML/XML',
                        value: 'markup'
                    },
                    {
                        text: 'JavaScript',
                        value: 'javascript'
                    },
                    {
                        text: 'CSS',
                        value: 'css'
                    },
                    {
                        text: 'PHP',
                        value: 'php'
                    },
                    {
                        text: 'Blade',
                        value: 'blade'
                    },
                    {
                        text: 'Ruby',
                        value: 'ruby'
                    },
                    {
                        text: 'Python',
                        value: 'python'
                    },
                    {
                        text: 'Java',
                        value: 'java'
                    },
                    {
                        text: 'C',
                        value: 'c'
                    },
                    {
                        text: 'C#',
                        value: 'csharp'
                    },
                    {
                        text: 'C++',
                        value: 'cpp'
                    }
                ],
            });
            // ClassicEditor
            //     .create(document.querySelector('#editor'), {
            //         simpleUpload: {
            //             uploadUrl: route('media.store'),
            //             headers: {
            //                 'X-CSRF-TOKEN': 'CSRF-Token',
            //             }
            //         }
            //     })
            //     .catch(error => {
            //         console.error(error);
            //     });
        </script>
    @endpush
    </x-app-layout>
