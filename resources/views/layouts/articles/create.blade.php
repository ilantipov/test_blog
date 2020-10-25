<!-- resources/views/layout/articles/create.blade.php -->
@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <h3>Создание публикации</h3>
    <form action="{{ url('article') }}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
        {!! csrf_field() !!}
        <div class="form-group row">
            <lebel for="article_title" class="col-md-2">Заголовок статьи</lebel>
            <div class="col-md-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите заголовок статьи">
            </div>
        </div>
        <div class="form-group row">
            <lebel for="article_title_sub" class="col-md-2">Подзаголовок статьи</lebel>
            <div class="col-md-10">
                <input type="text" class="form-control" name="name_short"  id="name_short" placeholder="Введите подзаголовок статьи">
            </div>
        </div>
        <div class="form-group row">
            <label for="preview" class="col-md-2">Выберите превью</label>
            <div class="col-md-10">
                <input type="file" class="form-control-file" name="preview" id="preview">
            </div>

        </div>
        <div class="form-group row">
            <lebel for="body" class="col-md-2">Текст статьи</lebel>
            <div class="col-md-10">
            <textarea class="form-control" name="body" id="body" placeholder="Текст"> </textarea>
            </div>
            <script>

            </script>
        </div>
        <div class="form-group row">
            <lebel for="category" class="col-md-2">Категория</lebel>
            <div class="col-md-10">
            <select class="form-control" name="categories[]" id="categories" multiple="multiple">
                @foreach ($categories->all() as $category)
                    <option id="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <lebel for="tags">Теги</lebel>
            </div>
            <div class="col-md-10">
            <input type="text" name="tags" class="form-control" id="tags" placeholder="Введите теги через запятую">
            </div>
        </div>

  <button type="submit" class="btn btn-primary">Создать статью</button>
</form>
@endsection
