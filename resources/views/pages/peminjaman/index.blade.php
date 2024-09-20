@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container mt-4">
    <h2>Data Peminjaman</h2>
    <a href="{{ url('/peminjaman/tambah') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th> <!-- Ganti ID dengan No. -->
                <th>NIS</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Detail</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $index => $item) <!-- Tambahkan variabel $index -->
                <tr>
                    <td>{{ $index + $peminjaman->firstItem() }}</td> <!-- Tampilkan nomor urut -->
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>
                        <a href="{{ url('/peminjaman/' . $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                    <td>
                        <a href="{{ url('/peminjaman/edit/' . $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/peminjaman/delete/' . $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $peminjaman->links('pagination::bootstrap-4') }} <!-- Ini untuk menampilkan navigasi pagination -->
    </div>
</div>
@endsection

@extends('layout.header')
