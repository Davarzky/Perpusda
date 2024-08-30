@extends('layout.footer')

@extends('layout.content')
@section('content')
<div class="container">
    <h2>Form Peminjaman</h2>

    <form>
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
    </form>
</div>
@endsection

@extends('layout.header')
