<!-- resources/views/articles/index.blade.php -->
@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <a href="{{ url('article') }}" class="nav-link">Добавить статью</a>
    @endif
    <h3>Просмотр статей</h3>

@endsection
