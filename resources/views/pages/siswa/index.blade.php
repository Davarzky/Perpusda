@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container">
    <h2>Data Siswa</h2>

    <!-- Dropdowns and Add Button -->
    <div class="mb-3">
        <label for="kelas-dropdown" class="form-label">Kelas</label>
        <select id="kelas-dropdown" class="form-select">
            <option value="" disabled selected>Pilih Kelas</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="jurusan-dropdown" class="form-label">Jurusan</label>
        <select id="jurusan-dropdown" class="form-select">
            <option value="" disabled selected>Pilih Jurusan</option>
            <option value="TM">TM</option>
            <option value="RPL">RPL</option>
            <option value="TKRO">TKRO</option>
            <option value="AK">AK</option>
        </select>
    </div>

    <a href="{{ url('/tambah') }}" class="btn btn-primary mb-3">Tambah Data Siswa</a>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Kelas</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_siswa as $siswa)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->no_telp }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>
                    <a href="{{ url('/edit/'.$siswa->nis) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ url('/delete/'.$siswa->nis) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layout.header')
