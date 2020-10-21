<!-- resources/views/articles/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h3>Создание публикации</h3>
    @include('common.errors')
    <form action="{{ url('article') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}
        <div class="form-group row">
            <lebel for="article_title" class="col-md-2">Заголовок статьи</lebel>
            <div class="col-md-10">
            <input type="text" class="form-control" id="article_title" placeholder="Введите заголовок статьи">
            </div>
        </div>
        <div class="form-group row">
            <lebel for="article_title_sub" class="col-md-2">Заголовок статьи</lebel>
            <div class="col-md-10">
                <input type="text" class="form-control" id="article_title_sub" placeholder="Введите подзаголовок статьи">
            </div>
        </div>
        <div class="custom-file row">
            <div class="col-md-2">text</div>
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label col-md-10" for="customFile" >выбрать превью</label>

        </div>
        <div class="form-group row">
            <lebel for="article_text" class="col-md-2">Текст статьи</lebel>
            <div class="col-md-10">
            <input type="textarea" class="form-control" id="article_text" placeholder="Текст">
            </div>
        </div>
        <div class="form-group row">
            <lebel for="article_category" class="col-md-2">Категория</lebel>
            <div class="col-md-10">
            <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <lebel for="article_tags">Теги</lebel>
            </div>
            <div class="col-md-10">
            <input type="text" class="form-control" id="article_tags" placeholder="Введите теги через запятую">
            </div>
        </div>

  <button type="submit" class="btn btn-primary">Создать статью</button>
</form>
@endsection
