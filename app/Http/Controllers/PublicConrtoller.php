<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PublicConrtoller extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }
}
