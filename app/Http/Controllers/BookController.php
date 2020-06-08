<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class BookController extends Controller
{
    public function index(){
//        $books = DB::select('SELECT * form `books`');

        $books = Book::all();

        return $books;
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

        return $book;
    }
}
