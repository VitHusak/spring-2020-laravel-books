@extends('layouts.layout')

@section('content')

    <h1>{{ $book->title }}</h1>
    <p>{{ $book->authors }}</p>
    <img src="{{ $book->image }}">


    <form method="post" action="/add-to-cart">
        @csrf

        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="number" name="count">

        <button>Add to cart</button>
    </form>

    <form action="{{ route('books.review', [ $book->id ]) }}" method="post" class="review-form">

        @csrf

        <h2>Add a review:</h2>

        {{-- success message --}}
        @if (Session::has('success_message'))
        
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>

        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="">
                Text:<br>
                <textarea name="text" cols="30" rows="10">{{ old('text') }}</textarea>
            </label>
        </div>

        <div class="form-group">
            <label for="">
                Rating:<br>
                <input type="number" name="rating" value="{{ old('rating') }}">
            </label>
        </div>

        <div class="form-group">
            <button>Submit review</button>
        </div>

    </form>

    <div class="review">

        <h2>Reviews</h2>

        <ul>
            @foreach ($book->reviews as $review)

                <li class="review">

                    {{ $review->text }}
                    <br>
                    <div class="rating">Rating: {{ $review->rating }}%</div>

                </li>

            @endforeach
        </ul>

    </div>

@endsection

