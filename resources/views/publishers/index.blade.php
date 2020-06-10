<h1>Publishers Index</h1>

@foreach($publishers as $p)
    <div>
        <h2>{{ $p->title }}</h2>
        <ul>

            @foreach($p->books as $b)
                <li>{{ $b->title }}</li>
            @endforeach

        </ul>

        <a href="publishers/{{ $p->id }}">Read more...</a>
    </div>
@endforeach
