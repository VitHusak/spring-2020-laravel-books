<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/books', 'APIBookController@index');

Route::get('/hello', 'HelloController@index');




Route::get('/books', 'BookController@index');

Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');

Route::get('/books/{book_id}', 'BookController@show');

Route::get('/books/{book_id}/edit', 'BookController@edit');
Route::post('/books/{book_id}', 'BookController@update');







//->where('book_id', '[0-9]+');


Route::get('/publishers', 'PublisherController@index');

Route::get('/publishers/{publisher_id}', 'PublisherController@show')->where('publisher_id', '[0-9]+');



Route::get('/books/{book_id}/reviews/{review_id}', 'ReviewController@show');

Route::get('/cart', 'CartController@index');
