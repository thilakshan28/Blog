<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user',
        'post',
    ];

    public function commentby(){
        return $this->belongsTo(User::class,'user');
    }

    public function post(){
        return $this->belongsTo(Post::class,'post');
    }
}
