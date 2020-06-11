@extends('layouts.layout', [
    'title' => 'List of books'
])

@section('content')

    <h1>Books Index</h1>

    @foreach($books as $b)
        <div>
            <h2>{{ $b->title }}</h2>
            <p>Authors: {{ $b->authors }}</p>

            <p>Publisher:
                @if($b->publisher)
                    {{ $b->publisher->title }}
                @else
                    Uknown
                @endif
            </p>

            <a href="books/{{ $b->id }}">Read more...</a>
        </div>
    @endforeach

@endsection