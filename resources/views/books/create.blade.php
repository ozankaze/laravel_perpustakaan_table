@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Buku</a></li>
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

                        {{-- @include('books._form') --}}
                        <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Nama</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title"
                                name="title" value="{{ old('title')}}" placeholder="" autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="author_id" class="col-md-2 control-label">Penulis</label>
                            <div class="col-md-4">
                                <select class="form-control{{ $errors->has('author_id') ? ' is-invalid' : '' }}" id="author_id" 
                                    name="author_id">
                                    <option value="">Pilih Penulis</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                        
                                @if ($errors->has('author_id'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('author_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="amount" class="col-md-2 control-label">Jumlah</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount"
                                name="amount" value="{{ old('amount')}}">
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cover" class="col-md-2 control-label">Cover</label>
                            <div class="col-md-4">
                                <input type="file" class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}" id="cover"
                                name="cover" autofocus>
                                {{-- @if ($errors->has('cover'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('cover') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                            <button type="submit" class="btn btn-primary" name="button">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection