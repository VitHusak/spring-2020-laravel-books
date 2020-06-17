<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function show($book_id, $review_id)
    {

    }

    public function delete($review_id)
    {
        if (\Gate::allows('delete_reviews')) {
            
            // delete the review
            $review = Review::findOrFail($review_id);

            $review->delete();

            session()->flash('success_message', 'Review was deleted');
        }

        return redirect()->action('BookController@show', [ $review->book_id ]);
    }
}
