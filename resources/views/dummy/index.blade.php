<!-- resources/views/dummy/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Пока не реализовано, но мы трудимся над этим</h3>
    <p>
    <a class="btn btn-outline-success" href="{{ url()->previous() }}">Ок, зайду попозже</a>
    </p>
</div>
@endsection

