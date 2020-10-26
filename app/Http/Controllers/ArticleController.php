<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;


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

        $Category = new Category();
        $Category->findOrFail($categoryId);

        return view('layouts.articles.index', [
            'articles' => $Articles->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', '=', $categoryId);
            })->with('user', 'tags')
                ->whereNotNull('published_at')
                ->paginate(5),
            'news' => $this->getLatestNews()

        ])->with('current_category', $Category->where('id', '=', $categoryId)->first()->name);

    }

    public function indexByUser(Request $request, $userId)
    {
        $Articles = new Article();

        User::findOrFail($userId);

        return view('layouts.articles.index', [
            'articles' => $Articles->whereHas('user', function ($q) use ($userId) {
                $q->where('users.id', '=', $userId);
            })->with('categories', 'tags')
                ->whereNotNull('published_at')
                ->paginate(5),
            'news' => $this->getLatestNews()

        ]);
    }

    private function switchNullableDateState($id, $stateName)
    {
        $Article = new Article();

        $articleObject = $Article->findOrFail($id);
        if($articleObject->publishedAt){
            $articleObject->$stateName = null;
        }
        else{
            $articleObject->$stateName = now();
        }
        $articleObject->save();
    }

    public function switchPublishedSate(Request $request, $id)
    {
         $this->switchNullableDateState($id, 'published_at');
            return back()->withInput();

    }

    public function switchTrashedState(Request $request, $id)
    {
        $this->switchNullableDateState($id, 'deleted_at');
        return back()->withInput();
    }

    public function indexAdmin(Request $request)
    {
        $Articles = new Article();
        return view('layouts.articles.indexAdmin', [
            'articles' => $Articles->with('categories', 'tags', 'user')
                ->orderBy('articles.created_at', 'desc')
                ->withTrashed()
                ->paginate(25),

        ]);
    }

    public function index(Request $request)
    {
        $Articles = new Article();

        return view('layouts.articles.index', [
            'articles' => $Articles->with('categories', 'tags', 'user')
                ->orderBy('articles.created_at', 'desc')
                ->whereNotNull('articles.published_at')
                ->paginate(5),
            'news' => $this->getLatestNews()
        ]);
    }


    public function create(Request $request)
    {
        return view('layouts.articles.create', [
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
            'preview' => 'image|required|max:10240'

        ]);


        $Article = new Article();
        $Article->name = $request->name;
        $Article->name_short = $request->name_short;
        $Article->preview = $request->preview;
        $Article->body = $request->body;
        $Article->user_id = Auth::id();


        $ArticlePreviewController = new ArticlePreviewController();
        $Article->preview = $ArticlePreviewController->update($request);

        $Article->save();

        $Article->categories()->sync($request->categories);

        $TagController = new TagController();
        $tagsParsed = $TagController->parseFromString($request);

        if (!empty($tagsParsed)) {
            $Article->tags()->sync($tagsParsed);
        }

        return redirect('/article/' . $Article->id);

    }

    public function view(Request $request, $id)
    {
        $Article = new Article();

        $articleInstance = $Article->findOrFail($id);

        //$articleInstance->increment('viewed');

        return view('layouts.articles.view', [
            'articles' => $articleInstance->where('id','=', $id)->with('categories', 'tags', 'user')->get(),
                //->with('categories', 'tags', 'user')->get()->dd(),
            'news' => $this->getLatestNews(),
            'comments' => $articleInstance->comments()->whereNotNull('moderated_at')->get()
        ]);

    }

    public function edit(Request $request, $id)
    {
        $articleInstance = new Article;
        Article::withTrashed()->findOrFail($id);

        //dd($articleInstance->withTrashed()->where('id','=',$id)->with('categories', 'tags', 'user')->first());
        return view('layouts.articles.create', [
            'categories' => Category::all()->sortBy('name'),
        ])->with('article',$articleInstance->withTrashed()->where('id','=',$id)->with('categories', 'tags', 'user')->first());
    }

    public function getLatestNews($count = 6)
    {
        //TODO новостей нет - вывожу последние статьи
        $Article = new Article();
        return $Article->latest()->limit($count)->get();
    }

    public function like(Request $request, $articleId)
    {
        $likeInstance = new LikesController();
        $likeInstance->Like($articleId, Auth::id());

        return redirect('/article/' . $articleId);
    }


}
