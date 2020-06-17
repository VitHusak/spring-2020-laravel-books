<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Author;

class AuthorController extends Controller
{
    public function index()
    {
        // $query = DB::table('authors'); // FROM `authors` (will return stdClass objects)

        $query = Author::query();      // FROM `authors` (will return App\Author objects)

        if (isset($page_nr) && $page_nr = 2) {
            $query->offset(10); // LIMIT 10, ...
        }

        $query->limit(10); // LIMIT 10

        $query->where('name', 'like', 'George%'); // WHERE `name` LIKE 'George%'

        $results = $query->get(); // SELECT *


        $authors = Author::query()
            ->with('books')
            ->limit(10)
            ->where('name', 'like', 'G%')
            ->get();

        // $results = Author::query()
        //     ->with('books')
        //     ->limit(10)
        //     ->where('name', 'like', 'G%')
        //     ->count();

        // dd($results);

        return view('authors.index', compact('authors'));
    }
}
