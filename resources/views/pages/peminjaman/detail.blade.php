@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container mt-4">
    <h2>Detail Peminjaman - {{ $peminjaman->id }}</h2>

    <div>
        <strong>NIS:</strong> {{ $peminjaman->nisn }}<br>
        <strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}<br>
        <strong>Tanggal Kembali:</strong> {{ $peminjaman->tanggal_kembali }}<br>
    </div>

    <h4 class="mt-4">Detail Peminjaman</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman->detailPeminjaman as $detail)
                <tr>
                    <td>{{ $detail->kode_buku }}</td>
                    <td>{{ $detail->buku ? $detail->buku->judul : 'N/A' }}</td>
                    <td>{{ $detail->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/peminjaman') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection

@extends('layout.header')
