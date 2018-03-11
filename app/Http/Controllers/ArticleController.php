<?php

namespace App\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use App\Taggable;
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
        $this->middleware('auth')->except(['index', 'show']);
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

        // Does the request have a featured image being uploaded?
        if ($request->has('featured-image')) {

            $featured = new UploadController;

            // Should this article show up in the slider?
            if ($request->has('is_featured')) {
                $images = $featured->save('thumbnail_large', $request->file('featured-image'));
                $article->is_featured = 1;
            } else {
                $images = $featured->save('thumbnail_small', $request->file('featured-image'));
            }

            $article->thumbnail = $images->thumbnail;
            $article->featured_image = $images->featured;
        }

        if ($article->save()) {
            if ($request->has('tags')) {
                $article->tags()->attach($request->tags);
            }
        }
        return back();
    }
}
