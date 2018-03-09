@extends('layouts.app')

@section('content')

<div class="container mx-auto" id="create-article">
  <div class="bg-white w-full shadow p-4">
    <form method="POST">
      {{csrf_field()}}
      <div>
        <h2 class="font-title mb-8">
          Create New Article
        </h2>
      </div>
      <div class="block">
        <div class="flex">
          <div class="w-3/4 mr-4">
            <div class="mb-4">
              <label for="title" class="block mb-1 font-title">Title</label>
              <input type="text" id="title" class="block px-2 py-3 border border-grey-lightish text-grey-medium rounded w-full {{ $errors->has('title') ? 'bg-error' : 'bg-white' }}" value="{{ old('title') }}" name="title" />
            </div>

            <div class="block">
              <label for="title" class="block mb-1 font-title">Content</label>
              <textarea
                  name="body"
                  id="editor"
                  class="block w-full text-grey-medium rounded {{ $errors->has('body') ? 'bg-error' : 'bg-grey-light' }}"
                  cols="30"
                  rows="10">{{old('body')}}</textarea>
            </div>
            <div class="block">
              <tags-viewer :tags="tags"></tags-viewer>
            </div>
          </div>
          <div class="w-1/4">
            <div class="block">
              <label for="title" class="block mb-1 font-title">Tags</label>
              <tags-dropdown @toggled="toggleTab"></tags-dropdown>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" class="bg-primary text-white px-4 py-3 shadow rounded">Save</button>
    </form>
  </div>
</div>

@stop

@section('scripts')

<script src="{{asset('js/Articles/entry.js')}}"></script>
@stop