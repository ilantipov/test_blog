<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:10',
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        return redirect('/tags');
    }

    public function index(Request $request)
    {
        return view('tags.index', [
            'tags' => Tag::all(),
        ]);
        return view('tags.index');
    }


}
