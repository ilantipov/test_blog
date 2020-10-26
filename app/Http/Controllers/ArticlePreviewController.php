<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;


class ArticlePreviewController extends Controller
{
        public function update(Request $request)
        {
            if(empty($request->file('preview'))){
               throw new FormSizeFileException('Пытался сохранить отсутствующий файл');
            }
            if(!$request->file('preview')->isValid()){
                throw new FormSizeFileException('Неправильный файл');
            }
            return $request->file('preview')->store('images/articles/previews/');

        }
}
