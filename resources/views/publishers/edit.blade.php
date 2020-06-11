@extends('layouts.layout', [
    'title' => 'Publisher management'
])

@section('content')
    
    <form action="{{ route('publishers.store') }}" method="post">
        @csrf

        <label for="">
            Title:<br>
            <input type="text" name="title" value="{{ $publisher->title }}">
        </label>
        <br>
        <br>

        <input type="submit" value="save">

    </form>

@endsection