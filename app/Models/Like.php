<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->hasMany('\App\Model\Article');
    }

    public function users()
    {
        return $this->hasMany('\App\Model\User');
    }
}
