<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $posts = Post::latest()->simplePaginate();
        return view('welcome', compact('posts'));
    }

    public function post(Post $post){
        return view('post', compact('post'));
    }

    public function Comment(Post $post, Request $request){
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user()->associate(auth()->user());
        $comment->post()->associate($post);
        $comment->save();
        return redirect()->back();
    }
}
