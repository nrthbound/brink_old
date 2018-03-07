<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Streamer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Streamers (Extract this to it's own class)
        $streamers = Streamer::all();
        $articles = Article::orderBy('created_at', 'desc')->with('tags')->get();
        return view('pages.home', compact('articles', 'streamers'));
    }
}
