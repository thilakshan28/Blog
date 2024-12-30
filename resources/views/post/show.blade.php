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
            <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Go Back</a>
                <h2 class="text-3xl font-semibold text-center">{{ $post->title }}</h2>
            </div>
        </div>

        <div class="card mt-6 p-6 bg-white shadow-md rounded-lg">
            <p class="text-gray-700 mb-4">
                {{ $post->content }}
            </p>
            <p class="text-gray-500 italic">
                <i>Author: {{ $post->user->name }}</i>
            </p>
            <p class="text-gray-500 italic">
                <i>Last Updated on: {{ $post->updated_at }}</i>
            </p>
        </div>
    </div>
</div>
@endsection
