<?php

namespace App\Http\Controllers;

use App\Book;
use App\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
//        $books = DB::select('SELECT * form `books`');

        $books = Book::all();


//        return view('books.index')->with('books', $books);

//        return view('books.index', ['books' => $books]);

        return view('books.index', compact('books'));
    }

    public function show($book_id){
        //        $book = DB::select('SELECT * form `books` WHERE `id` = ?', [$book_id]);

//        $book = Book::find($book_id);
//
//        if($book == null){
//            abort(404);
//
//            return 'Not found';
//        }

//        return Book::where('id', $book_id)->first();

//        return Book::where('id', $book_id)->get();
//        return Book::where('id', '=', $book_id)->get();

//        return Book::where('id', '>', $book_id)->get();


        $book = Book::findOrFail($book_id);

        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');

        $book->save();

        return redirect('/books/' . $book->id);
    }

    public function edit($book_id)
    {
        $book = Book::findOrFail($book_id);

        return view('books.edit', compact('book'));
    }

    public function update($book_id, Request $request){

        $book = Book::findOrFail($book_id);

        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');

        $book->save();

        return redirect('/books/' . $book->id);
    }

    public function review(Request $request, $book_id)
    {
        // validate
        $this->validate($request, [
            'text' => 'required|max:255',
            'rating' => 'nullable|numeric|between:0,100'
        ], [
            'rating.between' => 'That number is outside of bounds.',
            'text.required' => 'A review without a text does not make sense, love.',
            'text.max' => 'That is too much text!'
        ]);

        // prepare empty object (because this is create)
        $review = new Review;

        // fill object with data
        $review->book_id = $book_id;
        $review->text = $request->input('text');
        $review->rating = $request->input('rating');

        // save the object
        $review->save();

        // flash success message
        session()->flash('success_message', 'Review was saved. Thank you!');

        // redirect
        return redirect()->action('BookController@show', [ $book_id ]);
    }
}
