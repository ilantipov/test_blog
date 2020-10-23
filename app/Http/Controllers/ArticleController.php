<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        //
    }

    public function indexByCategory(Request $request, $categoryId)
    {
        $Articles = new Article();

        DB::connection()->enableQueryLog();

        $data = $Articles->categories();//->withPivot('category_id' , '=', $categoryId);


        dd(DB::getQueryLog()); // Show results of log



        return view('articles.index',[
            'articles' =>$Articles->all()
        ]);

    }
    public function index(Request $request)
    {
        $Articles = new Article();

        return view('articles.index', [
            'articles'  => $Articles->paginate()
        ]);
    }

    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('articles.create',[
                'categories' => Category::all()->sortBy('name'),
        ]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required|max:255',
            'name_short' => 'required|max:100',
            'body' => 'required|max:5000',
            'preview'   => 'image|nullable|max:10240'
        ]);


        $Article = new Article();
        $Article->name = $request->name;
        $Article->name_short = $request->name_short;
        $Article->body = $request->body;
        $Article->author_id = Auth::id();

        $ArticlePreviewController = new ArticlePreviewController();
        $Article->preview   = $ArticlePreviewController->update($request);

        $Article->save();

        $Article->categories()->sync($request->categories);

        $TagController = new TagController();
        $tagsParsed = $TagController->parseFromString($request);

        if (!empty($tagsParsed)){
            $Article->tags()->sync($tagsParsed);
        }

        return redirect('/articles');

    }


}
