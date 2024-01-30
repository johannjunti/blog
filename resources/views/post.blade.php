@extends('partials.layout')
@section('title', 'Home page')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-200 shadow-xl min-h-full">
            @if ($post->images->count() == 1)
                <figure>
                    <img src="{{ $post->images->first()->path }}" alt="{{ $post->title }}" />
                </figure>
            @elseif($post->images->count() > 1)
                <div class="carousel rounded-box">
                    @foreach ($post->images as $image)
                        <div class="carousel-item w-full">
                            <img src="{{ $image->path }}" class="w-full" />
                        </div>
                    @endforeach
                </div>
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

    <div class="card bg-base-200 shadow-xl min-h-full mt-3">
        <div class="card-body">
            <form action="{{route('comment', ['post' => $post])}}" method="POST">
                @csrf
                <label class="form-control">
                    <div class="label">
                        <span class="label-text">Comment</span>
                    </div>
                    <textarea name="body" class="textarea textarea-bordered h-24" placeholder="Content here...">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                    @enderror
                </label>
                <input type="submit" class="btn btn-primary" value="Comment">
            </form>
        </div>
    </div>

    @foreach ($post->comments()->latest()->get() as $comment)
        <div class="card bg-base-200 shadow-xl min-h-full mt-3">
            <div class="card-body">
                <p>{{ $comment->body }}</p>
                <p class="text-gray-400">{{ $comment->user->name }}</p>
                <p class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
    </div>
@endsection
