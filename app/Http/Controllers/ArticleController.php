<?php

namespace App\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Requests\CreateArticleRequest;
use App\AvailableTag as Tags;
use Illuminate\Http\Request;
use App\Article;
use App\Tag;

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

    public function show(Article $article)
    {
        $article->body = Markdown::convertToHtml($article->body);
        return view('pages.articles.view', compact('article'));
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
                $tag->slug = str_slug($t);
                $tag->save();
            }
				}
				return back();
    }
}
