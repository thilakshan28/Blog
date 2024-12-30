@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Home') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-2 bg-white border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                    Posts For You
                </h2>
                <a class="bg-blue-500 text-white text-base px-4 py-2 rounded-md hover:bg-blue-600" href="{{ route('post.create') }}">Create Post</a>
            </div>
        </div>
        <div class="card p-4 bg-white shadow-md mt-4">
            @foreach($posts as $post)
                <div class="mb-4">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <div class="flex justify-between items-center">
                            <span>{{ $post->title }}</span>
                            <div class="flex justify-end space-x-4">
                                @if(Auth::user()->id == $post->writer)
                                <form method="POST" action="{{ route('post.destroy', [$post->id]) }}" class="inline-block" onsubmit="return confirmDelete()">
                                    @method('delete')
                                    @csrf
                                    <button class="bg-red-500 text-white text-base px-4 py-2 rounded-md hover:bg-red-600">Delete Post</button>
                                </form>
                                <a class="bg-yellow-500 text-white text-base px-4 py-2 rounded-md hover:bg-yellow-600" href="{{ route('post.edit', $post->id) }}">Edit Post</a>
                                @endif
                                <a class="bg-green-500 text-white text-base px-4 py-2 rounded-md hover:bg-green-600" href="{{ route('post.comment', $post->id) }}">Comments</a>
                            </div>
                        </div>
                    </h2>
                    <p class="mt-2 text-gray-700">
                        {{ Str::limit($post->content, 500) }}
                    </p>
                    <a class="text-blue-500 hover:underline mt-2 block" href="{{ route('post.show', $post->id) }}">Read More >></a>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this post?");
    }
</script>
@endsection
