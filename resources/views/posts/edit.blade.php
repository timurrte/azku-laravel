<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create new post
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <a href="{{ route("posts.index") }}">
                <button type="button" class="mb-7 mx-12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">BACK</button>
            </a>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6 px-6 text-gray-900 dark:text-gray-100 ">
                    <form method="post" action="{{ route("posts.update", $post->id) }}">
                        @csrf
                        @method('patch')
                        <div>
                            <label for="title" class="block mb-2 ml-3 text-lg font-medium text-gray-900 dark:text-white">
                                Title</label>
                            <input name="title" value="{{ $post->title }}" id="title" type="text" placeholder="Title for the post" class="block w-full p-2 text-gray-900 border @if($errors->has('title')) border-red-300  dark:border-red-400 @endif @unless($errors->has('title')) border-gray-300 dark:border-gray-600 @endunless rounded-lg bg-gray-50 text-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('title')
                            <div class="ml-3 text-red-500">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="image" class="block mb-2 mt-3 ml-3 text- font-medium text-gray-900 dark:text-white">
                                Image URL</label>
                            <input type="text" value="{{ $post->image }}" id="image" name="image" placeholder="Image URL" class="is-invalid block w-full p-2 text-gray-900 border @if($errors->has('image')) border-red-300  dark:border-red-400 @endif @unless($errors->has('image')) border-gray-300 dark:border-gray-600 @endunless rounded-lg bg-gray-50 text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('image')
                            <div class="ml-3 text-red-500">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="content" class="block mb-2 mt-3 ml-3 text-lg font-medium text-gray-900 dark:text-white">
                                Content</label>
                            <textarea id="content" name="content" rows="4" class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border @if($errors->has('content')) border-red-300  dark:border-red-400 @endif @unless($errors->has('content')) border-gray-300 dark:border-gray-600 @endunless focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Content of the post">{{ $post->content }}</textarea>
                            @error('content')
                            <div class="ml-3 text-red-500">
                                {{ $message }}
                            </div>
                            @enderror

                            <div>
                                <label for="category" class="block mb-2 mt-3 ml-3 text-lg font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($categories as $category)
                                        <option
                                        {{ $category->id === $post->category->id ? ' selected ' : ''}}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    {{ $message }}
                                @enderror
                            </div>

                            <label for="tag_ids" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                            <select multiple name='tags[]' id="tag_ids" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($tags as $tag)
                                    <option
                                    @foreach($post->tags as $postTag)
                                        {{ $tag->id === $postTag->id ? ' selected ' : ''}}
                                    @endforeach
                                    value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="focus:outline-none mt-5 mx-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
