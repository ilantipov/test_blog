<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ArticlePreviewController extends Controller
{
        public function update(Request $request)
        {
            return $request->file('preview')->store('images');
        }
}
