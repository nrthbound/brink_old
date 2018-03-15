@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex">
            <!-- Begin left column -->
            <div class="flex-1 mr-4 bg-panel p-4 shadow">
              <carousel :per-page="1">
              @foreach($featuredArticles as $a)
                <slide>
                  <a class="no-underline" href="/article/{{$a->slug}}">
                    <div class="black-overlay mb-3 h-96 p-4 relative bg-cover" style="background-image: url('{{asset($a->thumbnail)}}');">
                      <div class="absolute z-50 featured-post">
                        <span class="font-title font-bold text-white text-4xl mb-4 flex">{{$a->title}}</span>

                        <div class="tags inline-block mr-4">
                          @foreach($a->tags as $t)
                          <span class="text-primary no-underline uppercase font-bold text-xs font-title mr-1">
                            {{$t->name}}
                          </span>
                          @endforeach
                        </div>

                        <div class="posted inline-block">
                          <span class="text-white no-underline uppercase font-bold text-xs font-title mr-1">
                            POSTED
                          </span>
                          <span class="text-primary no-underline uppercase font-bold text-xs font-title mr-1">
                            {{$a->created_at->diffForHumans()}}
                          </span>
                        </div>

                      </div>
                    </div>
                  </a>
                </slide>
              @endforeach
              </carousel>
              @foreach($articles as $a)
                <a class="no-underline relative" href="/article/{{$a->slug}}">
                  <div class="black-overlay h-32 p-4 mb-4 bg-cover" style="background-image: url('{{asset($a->thumbnail)}}');">
                    <div class="text-wrapper absolute z-50 normal-post">
                        <span class="font-title font-bold text-white text-2xl mb-4 flex">{{$a->title}}</span>

                        <div class="tags inline-block mr-4">
                          @foreach($a->tags as $t)
                          <span class="text-primary no-underline uppercase font-bold text-xs font-title mr-1">
                            {{$t->name}}
                          </span>
                          @endforeach
                        </div>

                        <div class="posted inline-block">
                          <span class="text-white no-underline uppercase font-bold text-xs font-title mr-1">
                            POSTED
                          </span>
                          <span class="text-primary no-underline uppercase font-bold text-xs font-title mr-1">
                            {{$a->created_at->diffForHumans()}}
                          </span>
                        </div>
                    </div>
                  </div>
                </a>
              @endforeach

              {{ $articles->links() }}
            </div>

            <!-- Begin Right column -->
            <div class="w-1/3">
              @foreach($streamers as $s)
                <div class="streamer mb-2 bg-panel p-4">
                  <div class="flex">
                    <div class="flex-initial mr-4">
                      <div class="bg-avatar-background w-16 h-16 border border-avatar-border rounded-full p-1">
                        <img src="{{$s->profile_image_url}}" class="rounded-full" alt="">
                      </div>
                    </div>
                    <div class="flex-1">
                      <a class="no-underline" href="http://twitch.com/{{$s->login}}" target="_blank">
                        <p class="text-white text-lg tracking-wide font-body mb-2">{{ ucfirst($s->display_name) }} </p>
                        @if($s->game)
                          <p class="font-title text-streamer-game mb-1">
                            <img src="{{ asset('images/controller-2.svg') }}" class="mr-2" alt=""> {{ $s->game }}
                          </p>
                        @else
                          <p class="font-title text-streamer-game">
                            <img src="{{ asset('images/controller-2.svg') }}" class="mr-2" alt=""> offline
                          </p>
                        @endif
                        @if($s->live)
                          <p class="text-white font-title text-sm"><img src="{{ asset('images/video_online.svg') }}" class="mr-2" alt=""> {{$s->viewer_count}}</p>
                        @else
                        <p class="text-white"><img src="{{ asset('images/video_offline.svg') }}" class="mr-2" alt=""></p>
                        @endif
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>

@stop