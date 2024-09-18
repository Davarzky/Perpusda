@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container">
    <h2>Data Kelas</h2>

    

    <a href="{{ url('/kelas/tambah') }}" class="btn btn-primary mb-3">Tambah Data Kelas</a>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tingkat</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_kelas as $kls)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $kls->tingkat }}</td>
                <td>{{ $kls->jurusan }}</td>
                <td>
                    <a href="{{ url('/kelas/edit/'.$kls->kode_kelas) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ url('/kelas/delete/'.$kls->kode_kelas) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layout.header')
