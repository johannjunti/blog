@extends('partials.layout')
@section('title', 'Login')
@section('content')
    <div class="container mx-auto">
        <div class="card w-1/2 m-auto bg-base-200 shadow-xl">
            <div class="card-body">
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input type="email" name="email" placeholder="Email" class="input input-bordered w-full"
                            value="{{ old('email') }}" />
                        @error('email')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input type="password" name="password" placeholder="Password" class="input input-bordered w-full"
                            value="{{ old('password') }}" />
                        @error('password')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </label>
                    <input type="submit" class="btn btn-primary mt-2" value="Login">
                </form>
            </div>
        </div>
    </div>
@endsection
