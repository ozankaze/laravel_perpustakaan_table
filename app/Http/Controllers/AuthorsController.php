<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Http\Requests\AuthorRequest;
use Session;

class AuthorsController extends Controller
{
    private $author; 

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $authors = Author::all();
        // $authors = Author::all()->orderBy('id', 'DESC')->paginate(5);
        $authors = $this->author->orderBy('id', 'DESC')->paginate(5);

        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        // dd($request);
        $author = Author::create($request->all());

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasill Menyimpan Buku <strong>$author->name</strong>"
        ]);

        return redirect()->route('authors.index');
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
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request,Author $author)
    {
        // dd($author($request->all()));
        $author->update($request->all());

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasill Mengupdate Penulis <strong>$author->name</strong>"
        ]);

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if (!$author->delete()) {
            return redirect()->back();
        }
        

        Session::flash("flash_notification", [
            "level" => "danger",
            "message" => "Berhasill Menghapus Penulis <strong>$author->name</strong>"
        ]);

        return redirect()->route('authors.index');
    }
}
