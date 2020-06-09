<h1>{{ $publisher->title }}</h1>

@foreach($books as $book)
    <h2>{{ $book->title }}</h2>
@endforeach
