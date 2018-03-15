<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTagRequest;
use App\Tag;

class TagController extends Controller
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

    public function show(Tag $tag)
    {
        $articles = $tag->articles;
        return view('pages.articles.all', compact('articles'));
    }

    public function read()
    {
        $tags = Tag::orderBy('name', 'asc')->get();
        return response()->json($tags, 200);
    }

    public function create()
    {
        return view('pages.tags.create');
    }

    public function save(CreateTagRequest $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->slug = strtolower(str_slug($request->name));
        if ($tag->save()) {
            return back();
        }
    }
}
