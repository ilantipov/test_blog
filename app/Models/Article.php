<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'name_short', 'preview_id', 'body'];

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
            Category::class,
            'article_tag',
            'article_id',
            'tag_id');
    }
}
