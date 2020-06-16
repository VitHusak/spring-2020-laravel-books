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




Route::get('/books', 'BookController@index')->name('books.index');

Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');

Route::get('/books/{book_id}', 'BookController@show');

Route::get('/books/{book_id}/edit', 'BookController@edit');
Route::post('/books/{book_id}', 'BookController@update');


Route::post('/books/{book_id}/review', 'BookController@review')->name('books.review');




//->where('book_id', '[0-9]+');


Route::get('/publishers', 'PublisherController@index')->name('publishers.index');

Route::get('/publishers/{publisher_id}', 'PublisherController@show')->where('publisher_id', '[0-9]+');

Route::get( '/publishers/create',    'PublisherController@create') ->name('publishers.create');
Route::post('/publishers',           'PublisherController@store')  ->name('publishers.store');
Route::get( '/publishers/{id}/edit', 'PublisherController@edit')   ->name('publishers.edit');
Route::put( '/publishers/{id}',      'PublisherController@update') ->name('publishers.update');




Route::get('/books/{book_id}/reviews/{review_id}', 'ReviewController@show');

Route::get('/cart', 'CartController@index');

Route::post('/add-to-cart', 'CartController@add');
