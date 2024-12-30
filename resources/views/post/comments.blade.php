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
                    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Go Back</a>  
                    <h2 class="text-3xl font-semibold text-center mt-4">{{ $post->title }}</h2>
                </div>
            </div>
            <div class="card p-4 mt-6 bg-white shadow-md">
                <p>{{ $post->content }}</p>
                <br><br>
                <p><i>Author: {{$post->user->name }}</i></p>
                <p><i>Last Updated on: {{$post->updated_at }}</i></p>
            </div>

            <div class="card p-4 mt-6 bg-white shadow-md">
                <p>{{ $count }} Comments</p>
                <br><br>
                @foreach($comments as $comment)
                    <div class="mb-4">
                        <p>{{ $comment->comment }}</p>
                        <p><i>Author: {{$comment->commentby->name }}</i></p>
                        <p><i>Published on: {{$comment->updated_at }}</i></p>
                    </div>
                @endforeach
            </div>

            <form method="POST" action="{{ route('comment.store', $post->id) }}">
                @csrf
                <div class="card p-4 bg-white shadow-md mt-6">
                    <label for="comment" class="block text-gray-700 font-semibold">Comment</label>
                    <textarea id="comment" class="form-textarea mt-2 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="comment" rows="4" required></textarea>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        Post Comment
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
