@extends('layouts.app')

@section('content')

    <div class="container mx-auto mb-4">
      <div>
          <h2>{{ $article->title }}</h2>
          <p>{{ $article->body }}</p>
      </div>

    </div>

    <div class="container mx-auto">
        <div class="flex">
            <!-- Begin left column -->
            <div class="flex-1">
                @foreach($articles as $a)
                  @if (!$loop->first)
                    {{$a->title}}
                  @endif
                @endforeach
            </div>

            <!-- Begin Right column -->
            <div class="w-1/4 bg-white mr-8 p-4">
              <span class="font-bold uppercase text-primary font-title">Streamers</span>
              <div class="streamer">
                Streamer 1
              </div>
              <div class="streamer">
                Streamer 1
              </div>
              <div class="streamer">
                Streamer 1
              </div>
            </div>
        </div>
    </div>

@stop