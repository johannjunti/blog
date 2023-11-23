@extends('partials.layout')
@section('title', 'Home page')
@section('content')
    <h1>Hello lavarel and hello</h1>
    <ul>
        @for ($i = 0; $i < 10; $i++)
            <li>{{ $i }}</li>
        @endfor
    </ul>
@endsection
