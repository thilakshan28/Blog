<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $count = Comment::where('post',$post->id)->count();
        $comments=Comment::with('commentby')->where('post',$post->id)->orderBy('id','desc')->paginate(12);

        return view('post.comments',compact('post','count','comments'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Post $post)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'post' => $post->id,
            'user' => Auth::user()->id,
        ]);

        return redirect()->route('post.comment',['post'=>$post->id]);
    }
}
