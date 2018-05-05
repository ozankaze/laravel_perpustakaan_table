@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penulis</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Penulis
                    <a class="btn btn-primary float-right" href="{{ route('authors.create') }}">Tambah</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Penulis</th>
                                <th></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td></td>
                                    <td>
                                        <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">EDIT</a>
                                            <button onclick="return confirm('Yakin Anda Mau Menghapus {{ $author->name }} ?')" type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $authors->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
