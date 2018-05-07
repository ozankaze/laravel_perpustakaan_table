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
                <div class="card-header">Daftar Buku</div>
                <div class="card-header">
                    <form action="{{ route('guest.search') }}" method="GET">
                        <input name="keyword" class="form-control col-3" type="text" placeholder="Search" aria-label="Search">
                    </form>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
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
                                    <td></td>
                                    <td>
                                        {{-- @role('admin') --}}
                                            <a href="{{ route('guest.books.borrow', $book->id) }}" class="btn btn-primary">Pinjam</a>
                                        {{-- @endrole --}}
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
