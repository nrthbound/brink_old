@extends('layouts.app')

@section('content')

<div class="container mx-auto">
  <div class="flex flex-wrap">
    @foreach($streams as $s)
      <div class="w-1/3 p-2">
      <div class="bg-panel flex items-center justify-center h-64 p-2 shadow" @if($s->live) style="background-size: cover; background-position: center center; background-image: url('{{ str_replace('{height}', '200', str_replace('{width}', '400', $s->thumbnail_url)) }}');" @endif>
          <img src="{{$s->profile_image_url}}" class="w-16 mr-4 rounded-full" alt="">
          <span class="text-lg font-bold font-title text-white">{{$s->display_name}}</span>
        </div>
      </div>
      @endforeach
    </div>
</div>


@stop