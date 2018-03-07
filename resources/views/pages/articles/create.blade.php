@extends('layouts.app')

@section('content')

<div class="container mx-auto">
  <div class="bg-white w-full shadow p-4">
    <form method="POST">
      {{csrf_field()}}
      <div>
        <h2 class="font-title mb-8">
          Create New Article
        </h2>
      </div>
      <div class="block mb-4">
        <div class="flex">
          <div class="w-3/4 mr-4">
              <label for="title" class="block mb-1 font-title">Title</label>
              <input type="text" id="title" class="block px-2 py-3 bg-input text-grey-medium rounded w-full {{ $errors->has('title') ? 'bg-error' : 'bg-grey-light' }}" value="{{ old('title') }}" name="title" />
          </div>
          <div class="w-1/4">
            <label for="title" class="block mb-1 font-title">Tags</label>
            @foreach($tags as $t)
              <input type="checkbox" name="tags[]" value="{{$t->id}}"> {{$t->name}} <br/>
            @endforeach
          </div>
        </div>
      </div>

      <div class="block mb-4">
        <label for="title" class="block mb-1 font-title">Content</label>
        <textarea
          name="body"
          class="block w-full text-grey-medium rounded {{ $errors->has('body') ? 'bg-error' : 'bg-grey-light' }}"
          cols="30"
          rows="10">{{old('body')}}</textarea>
      </div>

      <button type="submit" class="bg-primary text-white px-4 py-3 shadow rounded">Save</button>
    </form>
  </div>
</div>

@stop