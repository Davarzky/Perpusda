@extends('layout-user.header')

@section('css')
    <link rel="stylesheet" href="/style/style.css">
@endsection

@section('js')
    <script src="/style/script.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Form Pencarian -->
    <form action="{{ route('buku.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Cari buku berdasarkan judul" required>
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <!-- Tampilkan Buku -->
    <h3>Hasil Pencarian</h3>
    <div class="row mb-4">
        @forelse($buku as $bk)
            <div class="col-md-2 mb-4">
                <div class="card">
                    @if ($bk->gambar)
                        <img src="{{ asset('storage/' . $bk->gambar) }}" class="card-img-top" alt="{{ $bk->judul }}">
                    @else
                        <img src="/path/to/default-image.jpg" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $bk->judul }}</h5>
                        <p class="card-text">{{ $bk->penerbit }}</p>
                        <a href="{{ route('buku.detail', ['kode_buku' => $bk->kode_buku]) }}" class="btn btn-primary">Detail Buku</a>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada buku yang ditemukan.</p>
        @endforelse
    </div>
</div>
@endsection

@extends('layout-user.footer')
