<?php

namespace App\Http\Controllers;

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
}
