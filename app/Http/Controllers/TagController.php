<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $this->middleware('auth');
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required|max:10',
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        return redirect('/tags');
    }

    private function getTagByName($tagName)
    {
        return Tag::where('name', $tagName)->value('id');
    }

    public function index(Request $request)
    {
        return view('tags.index', [
            'tags' => Tag::all(),
        ]);
        return view('tags.index');
    }

    public function parseFromString(Request $request)
    {
        $tagsParsed = [];
        if(!empty($request->tags)){
            $tagsArray = explode(",", $request->tags);
            $tagsArray = array_map('trim', $tagsArray);
            foreach ($tagsArray as $tagName){
                if(empty($tagName)){
                    continue;
                }

                $currentTag = $this->getTagByName($tagName);
                if(!$currentTag){
                    $Tag = new Tag;
                    $Tag->name = $tagName;
                    $Tag->save();
                    $currentTag = $Tag->id;
                }
                $tagsParsed[] = $currentTag;
            }
        }
        return $tagsParsed;
    }

}
