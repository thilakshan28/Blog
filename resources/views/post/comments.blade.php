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
                <div class="p-2 bg-white border-b border-gray-200">
                <a href="{{route('dashboard')}}"> Go Back</a>  
                <h2 style="text-align: center;"> 
                {{ $post-> title}}
                </h2>
                </div>
                <div>
    </div>
    </div>
    <div class="card">
          <p>
          {{ $post->content}}
          </p>
            </br></br>
          <p> <i>Author :{{$post->user->name }}</i></p>
          <p> <i> Last Updated on :{{$post->updated_at }}</i></p>
    </div>
    <div class="card">
          <p>
          {{ $count}} Comments
          </p>
            </br></br>
        @foreach($comments as $comment)
          <p>{{$comment->comment }}</p>
          <p> <i>Author :{{$comment->commentby->name }}</i></p>
          <p> <i> Published on :{{$comment->updated_at }}</i></p>
        @endforeach
    </div>

    <form method="POST" action="{{ route('comment.store',$post->id) }}">
        @csrf
            <div class="card form-group">
                <label for="comment"> Comment</lablel>

                <input id="comment" class="form-control" type="text" name="comment" />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <button class="button create">
                    Post Comment
                </button>
            </div>
    </form>
    
        
    @endsection
    
