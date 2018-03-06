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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Featured Post
        $article = Article::latest()->first();

        // Get Streamers (Extract this to it's own class)
        $streamers = Streamer::all();

        $articles = Article::orderBy('id', 'asc')->get();
        return view('pages.home', compact('article', 'articles', 'streamers'));
    }
}
