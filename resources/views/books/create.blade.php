@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Buku</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambah Buku</div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('books.store') }}" method="post"  enctype="multipart/form-data">
                        @csrf

                        @include('books._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection