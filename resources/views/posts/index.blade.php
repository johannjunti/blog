@extends('partials.layout')
@section('title', 'Posts')
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary" href="{{route('posts.create')}}">Add Post</a>
        <table class="table table-zebra">
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <div class="join">
                                <a href="{{route('posts.view', ['post' => $post])}}" class="btn btn-info join-item">View</a>
                                <a href="{{route('posts.edit', ['post' => $post])}}" class="btn btn-warning join-item">Edit</a>
                                <form action="{{route('posts.destroy', ['post' => $post])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-error join-item" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
