@extends('layouts.app')

@section('content')

<div class="container mx-auto">
  <div class="bg-white w-full shadow p-4">
    <form method="POST">
      {{csrf_field()}}
      <div>
        <h2 class="font-title mb-8">
          Create New Tag
        </h2>
      </div>
      <div class="block mb-4">
        <label for="title" class="block mb-1 font-title">Tag Name</label>
        <input type="text" id="name" class="block px-2 py-3 bg-input text-grey-medium rounded w-full {{ $errors->has('name') ? 'bg-error' : 'bg-grey-light' }}" value="{{ old('name') }}" name="name" />
      </div>
      <button type="submit" class="bg-primary text-white px-4 py-3 shadow rounded">Save</button>
    </form>
  </div>
</div>

@stop