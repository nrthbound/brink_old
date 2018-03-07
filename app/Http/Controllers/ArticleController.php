<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateArticleRequest;
use App\Article;
use App\Tag;
use App\AvailableTag as Tags;

class ArticleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $article = Article::all();
        return view('pages.articles', compact('article'));
    }

    public function create()
    {
        $tags = Tags::all();
        return view('pages.articles.create', compact('tags'));
    }

    public function save(CreateArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->user_id = 1;
        $article->body = $request->body;
        if ($article->save()) {
            foreach($request->tags as $t) {
                $tag = new Tag;
                $tag->taggable_type = "App\Article";
                $tag->taggable_id = $article->id;
                $tag->name = $t;
                if ($tag->save()) {
                    return back();
                }
            }
        }
    }
}
