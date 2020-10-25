<!-- resources/views/layouts/categories/create.blade.php -->
@extends('layouts.app')

@section('content')
    <a href="{{ url('categories') }}" class="nav-link">Вернуться к списку категорий</a>
    <h3>Создание категории</h3>
    <form action="{{ url('category') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}
        @isset($category)
            <input type="hidden" name="id" value="{{$category->id}}">
        @endisset
        <div class="form-group row">
            <div class="col-md-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Введите название категории">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать категорию</button>
    </form>
@endsection
