<?php

namespace App\Http\Controllers;

use App\Book;

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



}
