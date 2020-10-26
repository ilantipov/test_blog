<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;


class ArticlePreviewController extends Controller
{
        private $storagePath = 'images/articles/previews/';

    private function getStoragePath()
    {
        return $this->storagePath;
        }

        public function update(Request $request)
        {
            if(empty($request->file('preview'))){
               throw new FormSizeFileException('Пытался сохранить отсутствующий файл');
            }
            if(!$request->file('preview')->isValid()){
                throw new FormSizeFileException('Неправильный файл');
            }
            return $request->file('preview')->store($this->getStoragePath());

        }

    public function previewExists($filePath)
    {
        $fileBasename = basename($filePath);
        return Storage::disk('local')->exists($this->getStoragePath() . $fileBasename);
    }
}
