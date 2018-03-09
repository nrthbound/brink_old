<?php

namespace App\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use App\Streamer;
use App\Article;

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
        $articles = Article::orderBy('created_at', 'desc')->with('tags')->simplePaginate(5);
        return view('pages.home', compact('articles', 'streamers'));
    }
}
