@extends('layout-user.header')

@section('css')
    <link rel="stylesheet" href="/style/style.css">
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            @if ($buku->gambar)
                <img src="{{ asset('storage/' . $buku->gambar) }}" class="img-fluid" alt="{{ $buku->judul }}">
            @else
                <img src="/path/to/default-image.jpg" class="img-fluid" alt="Default Image">
            @endif
        </div>
        <div class="col-md-8">
            <h2>{{ $buku->judul }}</h2>
            <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
            <p><strong>Kategori:</strong> {{ $buku->kategori->nama_kategori }}</p>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
