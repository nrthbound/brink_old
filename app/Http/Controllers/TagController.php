<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTagRequest;
use App\AvailableTag;
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
        $this->middleware('auth');
    }

    public function show(Tag $tag)
    {
        return $tag::with($tag->taggable_type)->get();
    }

    public function create()
    {
        return view('pages.tags.create');
    }

    public function save(CreateTagRequest $request)
    {
        $tag = new AvailableTag;
        $tag->name = $request->name;
        if ($tag->save()) {
            return back();
        }
    }
}
