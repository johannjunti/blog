@extends('partials.layout')
@section('title', 'New Post')
@section('content')
    <div class="container mx-auto">
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <label class="form-control w-full">
                <div class="label">
                  <span class="label-text">Title</span>
                </div>
                <input type="text" name="title" placeholder="Title" class="input input-bordered w-full" value="{{old('title')}}" />
                @error('title')
                    <div class="label">
                        <span class="label-text-alt text-error">{{$message}}</span>
                    </div>
                @enderror
              </label>
              <label class="form-control">
                <div class="label">
                  <span class="label-text">Content</span>

                </div>
                <textarea name="body" class="textarea textarea-bordered h-24" placeholder="Content here...">{{old('body')}}</textarea>
                @error('body')
                    <div class="label">
                        <span class="label-text-alt text-error">{{$message}}</span>
                    </div>
                @enderror
              </label>
              <input type="submit" class="btn btn-primary mt-2" value="Submit">
        </form>
    </div>
@endsection
