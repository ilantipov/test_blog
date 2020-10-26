<!-- resources/views/layout/articles/create.blade.php -->
@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <h3>Создание публикации</h3>
    <form action="{{ url('article') }}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
        @isset($article) <input type="hidden" name="id" value="{{ $article->id }}">@endisset
        {!! csrf_field() !!}
        <div class="form-group row">
            <lebel for="article_title" class="col-md-2">Заголовок статьи</lebel>
            <div class="col-md-10">

                <input type="text" class="form-control" name="name" id="name"
                       @isset($article) value="{{$article->name}}" @endisset placeholder="Введите заголовок статьи">
            </div>
        </div>
        <div class="form-group row">
            <lebel for="article_title_sub" class="col-md-2">Подзаголовок статьи</lebel>
            <div class="col-md-10">
                <input type="text" class="form-control" name="name_short" id="name_short"
                       @isset($article) value="{{$article->name_short}} @endisset"placeholder="Введите
                подзаголовок статьи">
            </div>
        </div>
        <div class="form-group row">
            <label for="preview" class="col-md-2">Выберите превью</label>
            <div class="col-md-10">
                <input type="file" class="form-control-file" name="preview" id="preview">
                <input type="hidden" name="preview_old" value="@isset($article){{ $article->preview }}@endisset" id="preview_old">
            </div>

        </div>
        <div class="form-group row">
            <lebel for="body" class="col-md-2">Текст статьи</lebel>
            <div class="col-md-10">
                <textarea class="form-control" name="body" id="body" placeholder="Текст">@isset($article) {!! $article->body  !!}@endisset </textarea>
            </div>
        </div>
        <div class="form-group row">
            <lebel for="category" class="col-md-2">Категория</lebel>
            <div class="col-md-10">
                <select class="form-control" name="categories[]" id="categories" multiple="multiple">
                    @foreach ($categories->all() as $category)
                        <option id="{{ $category->id }}" value="{{ $category->id }}"
                                @isset($article)
                                    @foreach($article->categories as $filledCategories)
                                    @if($category->id = $filledCategories)
                                    selected="selected"
                                    @endif
                                    @endforeach
                                @endisset

                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <lebel for="tags">Теги</lebel>
            </div>
            <div class="col-md-10">
                <input type="text" name="tags" class="form-control" id="tags" value="@isset($article){{ $article->tags->implode('name', ', ') }}@endisset" placeholder="Введите теги через запятую">

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
