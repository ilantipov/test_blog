<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        if(Category::where('name', $request->name)->first()){
            return view('categories.create')->withErrors(["error"=>"Такая категория уже существует!"]);
        }
            ;
        $tag = new Category();
        $tag->name = $request->name;
        $tag->save();

        return redirect('/categories');
    }


    private function getCategoryArticlesWithTotals()
    {
        $Category = new Category();
        return $Category->withCount('articles')->get();
    }
    public function index(Request $request)
    {
        return view('categories.index', [
            'categories' => $this->getCategoryArticlesWithTotals()
        ]);
    }

    public function edit(Request $request)
    {
        return view('dummy.index');
    }

    public function destroy(Request $request)
    {
        return view('dummy.index');
    }


}
