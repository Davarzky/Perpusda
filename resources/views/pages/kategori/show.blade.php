@extends('layout-user.header')

@section('css')
    <link rel="stylesheet" href="/style/style.css">
@endsection

@section('js')
    <script src="/style/script.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h2>{{ $kategori->nama_kategori }}</h2>
            <div class="row">
                @foreach($kategori->bukus as $buku)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($buku->gambar)
                                <img src="{{ asset('storage/' . $buku->gambar) }}" class="card-img-top" alt="{{ $buku->judul }}">
                            @else
                                <img src="/path/to/default-image.jpg" class="card-img-top" alt="Default Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $buku->judul }}</h5>
                                <p class="card-text">{{ $buku->penerbit }}</p>
                                <p class="card-text"><small class="text-muted">Published in {{ $buku->tahun_terbit }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout-user.footer')
