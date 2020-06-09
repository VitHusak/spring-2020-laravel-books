<h1>Publishers Index</h1>

@foreach($publishers as $p)
    <div>
        <h2>{{ $p->title }}</h2>
        <a href="publishers/{{ $p->id }}">Read more...</a>
    </div>
@endforeach
