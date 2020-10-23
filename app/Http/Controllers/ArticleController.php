<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Lexer\TokenEmulator\FlexibleDocStringEmulator;

class ArticleController extends Controller
{
    public function __construct()
    {
        //
    }

    public function indexByCategory(Request $request, $categoryId)
    {
        $Articles = new Article();

//        DB::connection()->enableQueryLog();
//
//        $data = $Articles->categories();//->withPivot('category_id' , '=', $categoryId);
//

        //dd(DB::getQueryLog()); // Show results of log



        return view('layouts.articles.news.index',[
            'articles' =>$Articles->all(),

        ]);

    }
    public function index(Request $request)
    {

        $Articles = new Article();
        // TODO Реализовать постраниый вывод с категориями и тегами
        /*
        DB::connection()->enableQueryLog();
        //$Articles->all();
        //$data =
        $ids = $Articles->all()->values('id');
        $data = $Articles->find(1)->categories();
        dd(compact($data));
        dd(DB::getQueryLog());
*/
        return view('layouts.articles.index', [
            'articles'  => $Articles->with('categories')->get(),
            'news'  => $this->getLatestNews()
        ]);
    }

    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('layouts.articles.create',[
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
        $Article->preview = $request->preview;
        $Article->body = $request->body;
        $Article->user_id = Auth::id();


        $ArticlePreviewController = new ArticlePreviewController();
        $Article->preview   = $ArticlePreviewController->update($request);

        $Article->save();

        $Article->categories()->sync($request->categories);

        $TagController = new TagController();
        $tagsParsed = $TagController->parseFromString($request);

        if (!empty($tagsParsed)){
            $Article->tags()->sync($tagsParsed);
        }

        return redirect('/article/' . $Article->id);

    }

    public function view(Request $request, $id)
    {
        $Article = new Article();
        $articleObject = $Article->find($id);
        if(!$articleObject) {
            return abort(404);
        }
        $Article->find($id)->increment('viewed');
        //dd($articleObject->get());
        /*DB::connection()->enableQueryLog();
        $qwe = $articleObject->find($id)->get();
        dd( $articleObject->find($id)->get());
        dd(DB::getQueryLog());*/
        return view('layouts.articles.view',[
            'articles' => $articleObject->where('id','=', $id)->with('categories')->with('tags')->get(),
            'news'  => $this->getLatestNews()
        ]);

    }

    public function getLatestNews($count = 6)
    {
        $Article = new Article();
        //DB::connection()->enableQueryLog();
        return $Article->latest()->limit($count)->get();

        //dd(DB::getQueryLog());
    }


}
