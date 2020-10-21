<!-- resources/views/tags/index.blade.php -->
@extends('layouts.app')

@section('content')
@if (count($tags) > 0)
    <!-- Список тегов -->
    <div class="" >
        <ul>
            @foreach ($tags->all() as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
