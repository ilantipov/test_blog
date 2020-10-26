<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('layouts.categories.create');
    }

    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        if(Category::where('name', $request->name)->where('id','!=', $request->id)->first()){
            return view('layouts.categories.create')->withErrors(["error"=>"Такая категория уже существует!"]);
        }
            ;

        if($request->id){
            $category = Category::find($request->id);
        }
        else{
            $category = new Category();
        }
        $category->name = $request->name;
        $category->save();

        return redirect('/categories');
    }


    private function getCategoryArticlesWithTotals()
    {
        $Category = new Category();
        return $Category->withCount('articles')->get();
    }
    public function index(Request $request)
    {
        return view('layouts.categories.index', [
            'categories' => $this->getCategoryArticlesWithTotals()
        ]);
    }

    public function edit(Request $request, int $id)
    {
        $categoryObject = Category::findOrFail($id);

        return view('layouts.categories.create')->with('category', $categoryObject);
    }

    public function delete(Request $request, $id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/categories/');
    }


}
