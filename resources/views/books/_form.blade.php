<div class="form-group">
    <label for="title" class="col-md-2 control-label">Nama</label>
    <div class="col-md-4">
        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title"
        name="title" autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="author_id" class="col-md-2 control-label">Penulis</label>
    <div class="col-md-4">
        {{-- <input type="text" class="form-control{{ $errors->has('author_id') ? ' is-invalid' : '' }}" id="author_id"
        name="author_id" autofocus> --}}

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
        name="amount" autofocus>
        @if ($errors->has('amount'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('amount') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-2 control-label">Cover</label>
    <div class="col-md-4">
        <input type="file" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
        name="cover" autofocus>
        @if ($errors->has('cover'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('cover') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
    <button type="submit" class="btn btn-primary" name="button">Simpan</button>
    </div>
</div>