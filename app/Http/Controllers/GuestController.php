<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class GuestController extends Controller
{
    private $book; 

    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    public function index()
    {
        $books = Book::with('author')->orderBy('id', 'DESC')->paginate(5);
        return view('guest.index', compact('books'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $books = $this->book->where('title', 'like', "%$keyword%") // pake kutip dua biar bisa baca pakai variable
            ->orderBy('id', 'DESC')->paginate(5);
        $books->appends(['keyword' => $keyword]); // bwat  nargeting pag  ke hal 2

        return view('guest.search', compact('books'));
    }
}
