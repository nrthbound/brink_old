@extends('layouts.app')

@section('content')

<div class="container mx-auto">
  <div class="bg-white w-full shadow p-4">
    <div class="text-center">
      <h2 class="font-title mb-8 text-center py-6">
        {{$article->title}}
      </h2>
        {!! $article->body !!}
    </div>
  </div>
</div>

@stop