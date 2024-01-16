@extends('partials.layout')
@section('title', 'Home page')
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-row flex-wrap">
            @foreach ($posts as $post)
                <div class="basis-1/4 my-2">
                    <div class="card bg-base-200 shadow-xl min-h-full m-2">
                        @if ($post->image)
                            <figure>
                                <img src="{{ $post->image }}" alt="{{ $post->title }}" />
                            </figure>
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ $post->snippet }}</p>
                            <p class="text-gray-400">{{ $post->user->name }}</p>
                            <p class="text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
