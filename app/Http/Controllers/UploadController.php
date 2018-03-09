<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function save(Request $request)
    {
        if ( $request->has('file') ) {
            if ( $request->file('file')->isValid() ) {
                $request->file->store('images');
                return response()->json(200);
            }
        }
    }
}
