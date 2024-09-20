
@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container">
    <h2>Data Buku</h2>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Judul</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $counter = ($buku->currentPage() - 1) * $buku->perPage() + 1; // Adjust counter for pagination
            @endphp
            @foreach ($buku as $bk)
                <tr>
                    <th scope="row">{{ $counter++ }}</th>
                    <td>
                        @if ($bk->gambar)
                            <img src="{{ asset('storage/' . $bk->gambar) }}" alt="{{ $bk->judul }}" class="img-thumbnail" style="width: 100px;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $bk->judul }}</td>
                    <td>{{ $bk->penerbit }}</td>
                    <td>{{ $bk->tahun_terbit }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $bk->kode_buku) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('buku.destroy', $bk->kode_buku) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tampilkan Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $buku->links('pagination::bootstrap-4') }} <!-- Bootstrap 4 Pagination Links -->
    </div>
    
</div>
@endsection
@extends('layout.header')