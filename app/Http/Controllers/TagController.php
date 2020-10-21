<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('tags.create');
    }

    public function store(Request $request)
    {
        die('here');
        $this->middleware('auth');
        return view('tags.create');



    }
}
