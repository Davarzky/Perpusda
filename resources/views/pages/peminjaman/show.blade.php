@extends('layout.footer')

@extends('layout.content')
@section('content')
<div class="container">
    <h2>Detail Peminjaman</h2>
    <div>
        <strong>ID:</strong> {{ $peminjaman->id }}<br>
        <strong>NISN:</strong> {{ $peminjaman->nisn }}<br>
        <strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_pinjam }}<br>
        <strong>Tanggal Kembali:</strong> {{ $peminjaman->tanggal_kembali }}
    </div>
    <h3>Detail Buku</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman->detailPeminjaman as $detail)
            <tr>
                <td>{{ $detail->kode_buku }}</td>
                <td>{{ $detail->buku->judul }}</td>
                <td>{{ $detail->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

@extends('layout.header')