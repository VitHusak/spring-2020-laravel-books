<?php

namespace App\Http\Controllers;

use App\Publisher;
use App\Book;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();

        return view('publishers.index', compact('publishers'));
    }

    public function show($publisher_id)
    {
        $publisher = Publisher::findOrFail($publisher_id);

        // get all the books where `publisher_id` == $publisher_id;

        // $books = Book::find($publisher_id); // get all the books where `id` == $publisher_id;

        $books = Book::where('publisher_id', $publisher_id)->get();

        return view('publishers.show', compact('publisher', 'books'));
    }
}
