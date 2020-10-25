<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FormSizeFileException;

class ArtictesBodyImageUploadController extends Controller
{
    private $storageDirectory ='images/articles/';

    private function getStorageDirectory()
    {
        return $this->storageDirectory;
    }
    public function store(Request $request)
    {
        //dd($request);
        if(empty($request->file('files'))){
            throw new FormSizeFileException('Пытался сохранить отсутствующий файл');
        }
        $result = [];
        foreach ($request->file('files')  as $file){
            $result['url'][] = $file->store($this->getStorageDirectory());
        }
        return response()->json($result, 200);
        //return $request->file('files')->store('images');

    }

    public function delete(Request $request)
    {

        $fileBasename = "articles/" . basename($request->file);
        if(empty($fileBasename) || !Storage::disk('local')->exists($fileBasename))
        {
            return response()->json(['error'=>'not found'], 404);
        }

        Storage::disk('local')->delete($this->getStorageDirectory() .  basename($fileBasename));
        return response()->json([], 200);
    }
}
