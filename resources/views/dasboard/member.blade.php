@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat Datang member Pilih Buku Sesuai Yang Anda Suka

                    <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">Buku dipinjam</td>
                                    <td>
                                        @if ($borrowLogs->count() == 0)
                                            Tidak ada buku dipinjam
                                        @endif
                                        <ul>
                                            @foreach ($borrowLogs as $borrowLog)
                                            <li>{{ $borrowLog->book->title }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        {!! $borrowLogs->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection