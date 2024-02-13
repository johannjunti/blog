<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Attribute;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $posts = Post::latest()->simplePaginate();
        return view('welcome', compact('posts'));
    }
    public function tag(Tag $tag){
        $posts = $tag->posts()->latest()->simplePaginate();
        return view('welcome', compact('posts'));
    }

    public function user(User $user){
        $posts = $user->posts()->latest()->simplePaginate();
        return view('user', compact('posts', 'user'));
    }

    public function post(Post $post){
        return view('post', compact('post'));
    }

    public function comment(Post $post, Request $request){
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user()->associate(auth()->user());
        $comment->post()->associate($post);
        $comment->save();
        return redirect()->back();
    }

    public function like(Post $post){
        $like = $post->likes()->where('user_id', auth()->user()->id)->first();
        if($like){
            $like->delete();
        } else {
            $like = new Like();
            $like->user()->associate(auth()->user());
            $like->post()->associate($post);
            $like->save();
        }
        return redirect()->back();
    }
    public function follow(User $user){
        if($user->authHasFollowed){
            $user->followers()->detach(auth()->user());
        } else {
            $user->followers()->attach(auth()->user());
        }
        return redirect()->back();
    }
    public function feed(){
        $posts = Post::whereIn(
            'user_id',
            auth()
            ->user()
            ->followees()
            ->select('id')
            ->get()
            ->pluck('id')
            ->toArray())
            ->latest()
            ->simplepaginate();
        return view('welcome', compact('posts'));
    }
}
