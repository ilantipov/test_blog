<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Session;

class LikesController extends Controller
{
    public function Like(int $articleId, int $userId)
    {
        $Like = new Like;

        if( $Like->where('article_id','=',$articleId)->where('user_id','=',$userId)->count()>0){
            Session::flash('flash_message', 'Вы уже проголосовали!');
            return false;
        }
        else {
            $articleInstance = Article::findOrFail($articleId);
            User::findOrFail($userId);

            $Like->article_id = $articleId;
            $Like->user_id = $userId;
            $Like->save();

            $articleInstance->increment('likes');
            Session::flash('flash_message', 'Ваш голос учтен!');
            return true;
        }

    }
}
