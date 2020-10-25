<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class CommentController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('layouts.comments.moderation',[
            'comments' => Comment::with('user')->orderBy('moderated_at')->orderBy('created_at')->get()
        ]);

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:5000',
            'article_id'    => 'required|integer'
        ]);
        //dd($request);
        Article::findOrFail($request->article_id);


        $Comment = new Comment();
        $Comment->body = $request->body;
        $Comment->body = $request->body;
        $Comment->user_id = Auth::id();
        $Comment->article_id  = $request->article_id;
        $Comment->save();
        return redirect('/article/' . $request->article_id);
    }

    public function changeModerationState(Request $request, $id)
    {
        $commentObject = Comment::findOrFail($id);
        if($commentObject->moderated_at == null){
            $commentObject->find($id)->update(['moderated_at' => now()]);
        }
        else{
            $commentObject->find($id)->update(['moderated_at' => null]);
        }
        return redirect('/comments/');
    }

    public function delete(Request $request, $id)
    {
        Comment::findOrFail($id)->delete();
        return redirect('/comments/');
    }
}
