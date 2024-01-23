<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $posts = Post::paginate();
        return view('welcome', compact('posts'));
    }
}
