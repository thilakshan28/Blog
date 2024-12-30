@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h2 class="text-2xl font-semibold">Edit Post</h2>
                </div>
            </div>
            <div class="bg-white p-6 shadow-md mt-4">
                <form method="POST" action="{{ route('post.update', [$post->id]) }}">
                    @method('patch')
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="block text-gray-700 font-semibold">Title</label>
                        <input id="title" class="form-input mt-2 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="title" value="{{ $post->title }}" required />
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-gray-700 font-semibold">Content</label>
                        <textarea id="content" class="form-textarea mt-2 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="content" rows="5" required>{{ $post->content }}</textarea>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            Update Post
                        </button>
                        <a href="{{ route('dashboard') }}" class="px-6 py-3 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
