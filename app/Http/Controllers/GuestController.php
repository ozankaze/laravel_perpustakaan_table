<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class GuestController extends Controller
{
    public function index()
    {
        $books = Book::with('author');
        return view('guest.index', compact('books'));
    }
}
