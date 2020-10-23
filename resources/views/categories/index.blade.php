<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <a href="{{ url('category') }}" class="nav-link">Добавить категорию</a>
    @endif

    @if (count($categories) > 0)
        <!-- Список категорий -->
        <div class="">
            @foreach ($categories->all() as $category)
                <div class="row">
                    <div class="col-md-4">{{ $category->name }} (<a
                            href="{{ url('articles/category') }}/{{ $category->id }}">{{ $category->articles_count }}
                            )</a></div>
                    <div class="col-md-2">
                        <a href="{{ url('category') }}/{{ $category->id }}" class="btn">Изменить</a>
                        <a href="{{ url('category') }}/{{ $category->id }}" class="btn">Удалить</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
