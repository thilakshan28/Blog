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
                <div class="p-2 bg-white border-b border-gray-200">
                <h2>Posts For You
                <a class="button create right" href="{{route('post.create')}}">Create Post</a>
                </h2>
                </div>
                <div>
    </div>
    </div>
    <div class="card">
    @foreach($posts as $post)
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <form method="POST" action="{{ route('post.destroy',[$post->id]) }}">
                @method('delete') @csrf
                <button class="button delete right">Delete Post</button>
                </form>
                <a class="button edit right" href="{{route('post.edit',$post->id)}}">Edit Post</a>
                <a class="button create right" href="{{route('post.comment',$post->id)}}">Comments</a>
                {{$post->title}}
          </h2>
          </br>
          <p>
          {{ Str::limit($post->content,500) }}
          </p>
              <a class="right"  href="{{route('post.show',$post->id)}}">Read More >></a>
          </br> 
            </br>  
          @endforeach
    </div>
        
    @endsection
    
