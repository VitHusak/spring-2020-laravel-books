<h1>Books Index</h1>

@foreach($books as $b)
    <div>
        <h2>{{ $b->title }}</h2>
        <p>Authors: {{ $b->authors }}</p>
        <p>Publisher: XYZ</p>
        <a href="books/{{ $b->id }}">Read more...</a>
    </div>
@endforeach
