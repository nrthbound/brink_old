@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="bg-white w-full shadow p-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <h2 class="font-title mb-8">
                Login
                </h2>
            </div>
            <div class="block mb-4">
                <label for="email" class="block mb-1 font-title">Email</label>
                <input type="text" id="email" class="block px-2 py-3 bg-input text-grey-medium rounded w-full {{ $errors->has('email') ? 'bg-error' : 'bg-grey-light' }}" value="{{ old('email') }}" name="email" />
            </div>

            <div class="block mb-4">
                <label for="title" class="block mb-1 font-title">Password</label>
                <input type="password" id="name" class="block px-2 py-3 bg-input text-grey-medium rounded w-full {{ $errors->has('password') ? 'bg-error' : 'bg-grey-light' }}" value="{{ old('name') }}" name="password" />
            </div>

            <button type="submit" class="bg-primary text-white px-4 py-3 shadow rounded">Login</button>
        </form>
    </div>
</div>
@endsection
