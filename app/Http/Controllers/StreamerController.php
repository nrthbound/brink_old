<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use romanzipp\Twitch\Twitch;
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

        // Get User by Username
        // $userResult = $twitch->getStreamsByUserNames($streamers);
        // dd($userResult);
        // $headers = [
        //     'Authorization' => 'Bearer ' . env('TWITCH_CLIENT_ID'),
        //     'Accept' => 'application/json'
        // ];

        // $client = new \GuzzleHttp\Client();
        // $res = $client->request('GET', 'https://api.twitch.tv/helix/users', [
        //     'headers' => $headers
        // ]);
        // dd($res);
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
