@extends('layouts.app')

@section('content')
    <div class="container mx-auto bg-white p-4 shadow">
        <div class="flex">
            <!-- Begin left column -->
            <div class="flex-1 mr-4">
              <div class="mb-3 items-center justify-center flex flex-col h-96 relative bg-cover" style="background-image: url('{{asset('images/test-post.jpg')}}');">
                <span class="text-center font-title uppercase text-white text-4xl flex">Setup Streamlabs OBS</span>
              </div>

              <div class="bg-test p-4 bg-cover">
                This is a post.
              </div>
            </div>

            <!-- Begin Right column -->
            <div class="w-1/3 p-4">
              <span class="font-bold uppercase text-primary font-title mb-4 block">Streamers</span>
              @foreach($streamers as $s)
                <div class="streamer mb-2">
                  {{$s->name}}
                </div>
              @endforeach
            </div>
        </div>
    </div>

@stop