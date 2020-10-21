<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        //
    }
    public function index(Request $request)
    {
        return view('articles.index');
    }

    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'article_title' => 'required|max:10',
        ]);
        $request->user()->tasks()->create([
            'article_title' => $request->article_title,
        ]);

        return redirect('/articles');

    }
}
