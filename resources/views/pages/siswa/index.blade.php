@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container">
    <h2>Data Siswa</h2>

    <!-- Dropdowns and Add Button -->
    <div class="mb-3">
        {{-- Optionally include dropdown for filtering or selecting classes --}}
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
                <td>{{ $siswa->kelas->tingkat }} - {{ $siswa->kelas->jurusan }}</td> <!-- Display class details -->
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
