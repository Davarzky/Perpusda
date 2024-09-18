@extends('layout.footer')
@extends('layout.content')

@section('content')
<div class="container">
    <h2>Tambah Kelas</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ url('/kelas/save') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tingkat">Tingkat</label>
            <input type="text" name="tingkat" id="tingkat" class="form-control" placeholder="Masukkan Tingkat" required>
        </div>
        
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Masukkan Jurusan" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
@extends('layout.header')
