@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($pengembalian) ? 'Edit' : 'Tambah' }} Pengembalian Buku</h2>
    <form id="pengembalianForm" action="{{ isset($pengembalian) ? route('pengembalian.update', $pengembalian->id) : route('pengembalian.store') }}" method="POST">
        @csrf
        @if(isset($pengembalian))
            @method('PUT')
        @endif
        
        <div class="row mb-3">
            <label for="id_pengembalian" class="col-form-label col-3">ID Pengembalian</label>
            <div class="col-5">
                <input type="text" name="id_pengembalian" id="id_pengembalian" class="form-control" value="{{ $pengembalian->id ?? '' }}" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <label for="tanggal_kembali" class="col-form-label col-3">Tanggal Kembali</label>
            <div class="col-3">
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ $pengembalian->tanggal_kembali ?? '' }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="nisn" class="col-form-label col-3">NIS</label>
            <div class="col-5">
                <input type="number" name="nisn" id="nisn" class="form-control" value="{{ $pengembalian->nisn ?? '' }}" required>
            </div>
        </div>

        <h4 class="mt-4">Detail Pengembalian</h4>
        <table class="table table-sm table-striped" id="detailTable">
            <thead>
                <tr class="align-middle">
                    <th>
                        <label for="kode_buku" class="form-label">Kode Buku</label>
                        <input type="text" id="kode_buku" class="form-control form-control-sm">
                    </th>
                    <th>
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" id="judul_buku" class="form-control form-control-sm" disabled>
                    </th>
                    <th>
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" id="jumlah" class="form-control form-control-sm">
                    </th>
                    <th>
                        <button type="button" id="addDetailBtn" class="btn btn-primary btn-sm mt-4">Tambah</button>
                    </th>
                </tr>
            </thead>
            <tbody id="detailBody">
                @foreach($pengembalian->detailPengembalian ?? [] as $detail)
                <tr>
                    <td>{{ $detail->kode_buku }}</td>
                    <td>{{ $detail->buku->judul }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">Hapus</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Simpan Pengembalian</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // JavaScript untuk menangani pengambilan data dan menambahkan detail tetap sama
</script>
@endsection
