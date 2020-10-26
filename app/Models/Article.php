<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'name_short', 'preview_id', 'body'];


    public function comments()
    {

        return $this->hasMany('App\Models\Comment','article_id');

    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'article_category',
            'article_id',
            'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'article_tag',
            'article_id',
            'tag_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {

    }

}
