<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTagRequest;
use App\AvailableTag as Tag;

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

    public function create()
    {
        return view('pages.tags.create');
    }

    public function save(CreateTagRequest $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;
        if ($tag->save()) {
            return back();
        }
    }
}
