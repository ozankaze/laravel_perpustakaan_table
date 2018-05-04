@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buku</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Buku
                    <a class="btn btn-primary float-right" href="{{ route('books.create') }}">Tambah</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Amount</th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->amount }}</td>
                                    <td></td>
                                    <td>
                                        <form action="" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="" class="btn btn-warning">EDIT</a>
                                            <button onclick="return confirm('Yakin Anda Mau Menghapus {{ $book->title }} ?')" type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $books->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
