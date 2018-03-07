@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="bg-white w-full shadow p-4">
        <div>
          <h2 class="font-title mb-8">
            Articles
          </h2>
        </div>
        @foreach($articles as $article)
          <div class="block mb-4">
            {{$article->title}}
          </div>
        @endforeach
    </div>
  </div>

@stop