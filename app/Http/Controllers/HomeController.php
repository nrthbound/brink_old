<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $articles = Article::orderBy('id', 'asc')->get();
        return view('pages.home', compact('article', 'articles'));
    }
}
