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
        @foreach($kategoris as $kategori)
            <div class="col-md-4 mb-4">
                <h3>{{ $kategori->nama_kategori }}</h3>
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
                                    <a href="{{ route('kategori.show', $kategori->kode_kategori) }}" class="btn btn-primary">View Category</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layout-user.footer')
