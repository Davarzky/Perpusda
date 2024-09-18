@extends('layout.footer')
@extends('layout.content')


@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span class="card-title h5">Edit Data Kelas</span>
            <a href="{{ url('/data-kelas') }}" class="btn btn-primary" style="width: 100px; height:40px;">Kembali</a>
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
            <form action="{{ url('/kelas/edit/'.$kelas->kode_kelas) }}" method="post">
                @csrf
                @method('PUT') 
                <div class="form-group">
                    <label for="tingkat">Tingkat</label>
                    <input type="text" name="tingkat" id="tingkat" class="form-control" value="{{ $kelas->tingkat }}" required>
                </div>
                
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ $kelas->jurusan }}" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layout.header')


