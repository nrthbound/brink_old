<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twitch\Twitch;
use App\Streamer;

class StreamerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function show(Twitch $twitch)
    {
        // $streamers = Streamer::pluck('name')->toArray();
        // $twitch->getStreamersStatusByName($streamers);
    }

    public function create()
    {
        return view('pages.streamers.create');
    }

    public function save(Request $request)
    {
        $streamer = new Streamer;
        $streamer->name = $request->name;
        if ($streamer->save())
        {
            return back();
        }
    }

}
