<!-- resources/views/tags/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h3>Создание тега</h3>
    @include('common.errors')
    <form action="{{ url('tag') }}" method="POST" class="form-horizontal">
        <div class="form-group row">

            <div class="col-md-2">
                <input type="text" class="form-control" id="name" placeholder="Введите заголовок тега">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать статью</button>
    </form>
@endsection
