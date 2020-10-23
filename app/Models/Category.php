<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany(
            Article::class,
            'article_category',
            'category_id',
            'article_id'
            );
    }
}
