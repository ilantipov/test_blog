<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Tag extends Model
{
    // Для тестирования разбиения тегов в ручном режиме
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

}
