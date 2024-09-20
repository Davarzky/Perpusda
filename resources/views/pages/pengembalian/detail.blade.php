@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container mt-4">
    <h2>Detail Pengembalian Buku</h2>
    <div>
        <strong>ID Pengembalian:</strong> {{ $pengembalian->id }}<br>
        <strong>NIS:</strong> {{ $pengembalian->nisn }}<br>
        <strong>Tanggal Kembali:</strong> {{ $pengembalian->tanggal_kembali }}<br>
    </div>
    <h4 class="mt-4">Detail Buku</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengembalian->detailPengembalian as $detail)
            <tr>
                <td>{{ $detail->kode_buku }}</td>
                <td>{{ $detail->buku->judul }}</td>
                <td>{{ $detail->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
