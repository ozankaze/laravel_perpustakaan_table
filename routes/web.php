<?php

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

Route::get('/', 'GuestController@index')->name('/');
Route::get('/search', 'GuestController@search')->name('guest.search');
// Pinjam Buku
Route::get('books/{book}/borrow', 'BooksController@borrow')->name('guest.books.borrow');
Route::patch('books/{book}/return', 'BooksController@return')->name('member.books.borrow');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
    Route::resource('authors', 'AuthorsController');
    Route::get('search/authors', 'AuthorsController@search')->name('authors.search');
    Route::resource('books', 'BooksController');
    Route::get('search/books', 'BooksController@search')->name('books.search');
});
