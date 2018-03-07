@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="bg-white w-full shadow p-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <h2 class="font-title mb-8">
                Register
                </h2>
            </div>
            <div class="block mb-4">
                <label for="title" class="block mb-1 font-title">Name</label>
                <input type="text" id="name" class="block px-2 py-3 bg-input text-grey-medium rounded w-full {{ $errors->has('name') ? 'bg-error' : 'bg-grey-light' }}" value="{{ old('name') }}" name="name" />
            </div>

            <div class="block mb-4">
                <label for="title" class="block mb-1 font-title">Email Address</label>
                <input type="text" id="name" class="block px-2 py-3 bg-input text-grey-medium rounded w-full {{ $errors->has('email') ? 'bg-error' : 'bg-grey-light' }}" value="{{ old('name') }}" name="email" />
            </div>

            <div class="block mb-4">
                <label for="title" class="block mb-1 font-title">Password</label>
                <input type="password" id="name" class="block px-2 py-3 bg-input text-grey-medium rounded w-full {{ $errors->has('password') ? 'bg-error' : 'bg-grey-light' }}" value="{{ old('name') }}" name="password" />
            </div>

            <div class="block mb-4">
                <label for="password-confirmation" class="block mb-1 font-title">Confirm Password</label>
                <input type="password" id="password-confirmation" class="block px-2 py-3 bg-input text-grey-medium rounded w-full bg-grey-light" name="password_confirmation" />
            </div>
            <button type="submit" class="bg-primary text-white px-4 py-3 shadow rounded">Save</button>
        </form>
    </div>
</div>
@endsection
