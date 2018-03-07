<?php

namespace App\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Requests\CreateArticleRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Article;
use App\Taggable;

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
        $tags = Tag::all();
        return view('pages.articles.create', compact('tags'));
    }

    public function save(CreateArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->user_id = 1;
        $article->body = $request->body;
        if ($article->save()) {
					if ($request->has('tags')) {
						foreach($request->tags as $t) {
							$article->tags()->attach($t);
						}
					}
				}
				return back();
    }
}
