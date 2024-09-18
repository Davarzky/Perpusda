@extends('layout.footer')
@extends('layout.content')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-items-center justify-content-between">
            <span class="card-title h5">Data siswa</span>
            <a href="/data-siswa" class="btn btn-primary" style="width: 100px; height:40px;">Kembali</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/tambah" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="nis" class="col-form-label col-3">NIS</label>
                    <div class="col-9">
                        <input type="number" class="form-control" id="nis" name="nis">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-form-label col-3">Nama</label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-form-label col-3">Alamat</label>
                    <div class="col-9">
                        <textarea name="alamat" id="alamat" class="form-control" name="alamat"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_telp" class="col-form-label col-3">No Telepon</label>
                    <div class="col-9">
                        <input type="number" id="no_telp" class="form-control" name="no_telp">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_lahir" class="col-form-label col-3">Tanggal Lahir</label>
                    <div class="col-9">
                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kode_kelas" class="col-form-label col-3">Kelas</label>
                    <div class="col-9">
                        <select id="kode_kelas" class="form-select" name="kode_kelas">
                            <option value="" disabled selected>Pilih Kelas</option>
                            @foreach($kelass as $kelas)
                                <option value="{{ $kelas->kode_kelas }}">{{ $kelas->tingkat }} - {{ $kelas->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary form-control">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layout.header')
