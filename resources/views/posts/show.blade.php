<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="flex justify-between mx-12">
                <a href="{{ route("posts.index") }}">
                    <button type="button" class="mb-7 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">BACK</button>
                </a>

                <a href="{{ route("posts.edit", $post->id) }}">
                    <button type="button" class="mb-7 text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-green-700 dark:hover:bg-green-800 focus:outline-none dark:focus:ring-green-800">EDIT</button>
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6 px-6 text-gray-900 dark:text-gray-100 ">
                    {{ $post->content }}
                </div>
            </div>
            <form method="post" class="flex flex-col" action={{ route("posts.destroy", $post->id) }}>
                @csrf
                @method('delete')
                <button type="submit" class="focus:outline-none mt-5 mr-11 place-self-end text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">DELETE</button>
            </form>
        </div>
        
    </div>
</x-app-layout>
