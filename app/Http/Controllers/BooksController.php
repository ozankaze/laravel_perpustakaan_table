<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use Session;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    private $book; 

    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')->orderBy('id', 'DESC')->paginate(5); // ambil buku yang ada author 
        
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        // dd($request);

        $book = Book::create($request->except('cover'));

        // cek jika upload gambar
        if ($request->hasFile('cover')) {
            // ambil file yang di upload
            $uploaded_image = $request->file('cover');
  
            // mengambil extention file
            $extension = $uploaded_image->getClientOriginalExtension();
  
            // membuat nama file scara acak, untuk menghindari duplikasi nama gambar
            $filename = md5(time()) . '.' . $extension;
  
            // simpan gambar ke folder public/Cover
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
  
            $uploaded_image->move($destinationPath, $filename);
  
            // simpan file kedalam database
            $book->cover = $filename;
            $book->save();
        }

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasill Menyimpan Buku"
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {

        // cara pertama
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));

        // cara kedua
        /* $book = Book::findOrFail($id);
        $authors = Author::all();
        return view('books.create', compact('authors', 'book')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $book = Book::findOrFail($id);
        $book->update($request->all());

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasill Mengupdate Buku <strong>$book->title</strong>"
        ]);

        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $books = $this->book->where('title', 'like', "%$keyword%") // pake kutip dua biar bisa baca pakai variable
            ->orderBy('id', 'DESC')->paginate(5);
        $books->appends(['keyword' => $keyword]); // bwat  nargeting pag  ke hal 2

        return view('books.search', compact('books'));
    }
}
