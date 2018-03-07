@extends('layouts.app')

@section('content')

<div class="container mx-auto">
  <div class="bg-white w-full shadow p-4">
    <div>
      <h2 class="font-title mb-8">
        {{$article->title}}
      </h2>
      <p>
        {!! $article->body !!}
      </p>
    </div>
  </div>
</div>

@stop