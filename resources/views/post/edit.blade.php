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
                   <h2> Edit Post</h2>
                </div>
                <div>
    </div>
    </div>
    <form method="POST" action="{{ route('post.update',[$post->id]) }}">
    @method('patch') @csrf
            <div class="card form-group">
                <label for="email"> Title</lablel>

                <input id="title" class="form-control" type="text" name="title" value="{{$post->title}}"/>
            </div>

            <div class="card form-group">
                <label for="content"> Content</lablel>

                <textarea id="content" class="form-control" name="content" >{{$post->content}}</textarea>
            </div>

           

            
            <div class="flex items-center justify-end mt-4">
                <button class="button create">
                    Update
                </button>
                <a href="{{ route('dashboard')}}"class="button cancel">
                    Cancel
                </a>
            </div>
        </form>
    @endsection
