<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('pages.articles', compact('article'));
    }

    public function create()
    {
        // Load Create Form view
    }

    public function save()
    {
        // Save new Article
    }
}
