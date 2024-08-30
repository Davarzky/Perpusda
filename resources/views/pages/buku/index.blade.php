@extends('layout.footer')


@extends('layout.content')
@section('content')
<div class="container">
<h2>Data Buku</h2>


<button type="button" class="btn btn-primary mb-3">Tambah Data Siswa</button>
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
        <tr>
            <th scope="row">1</th>
            <td><img src="{{ asset('img/Dilan-1990.jpg') }}" alt="Dilan 1990" class="img-thumbnail" style="width: 100px;"></td>
            <td>Dilan 1990</td>
            <td>Gramedia</td>
            <td>2018</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td><img src="{{ asset('img/Dilan-1991.jpg') }}" alt="Dilan 1991" class="img-thumbnail" style="width: 100px;"></td>
            <td>Dilan 1991</td>
            <td>Gramedia</td>
            <td>2019</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td><img src="{{ asset('img/milea-suara-dilan.jpeg') }}" alt="Milea: Suara dari Dilan" class="img-thumbnail" style="width: 100px;"></td>
            <td>Milea: Suara dari Dilan</td>
            <td>Gramedia</td>
            <td>2020</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td><img src="{{ asset('img/Dilan-1990.jpg') }}" alt="Dilan: Dia adalah Dilanku Tahun 1990" class="img-thumbnail" style="width: 100px;"></td>
            <td>Dilan: Dia adalah Dilanku Tahun 1990</td>
            <td>Gramedia</td>
            <td>2019</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <th scope="row">5</th>
            <td><img src="{{ asset('img/Filosofi-Teras.jpg') }}" alt="Filosofi Teras" class="img-thumbnail" style="width: 100px;"></td>
            <td>Filosofi Teras</td>
            <td>Gramedia</td>
            <td>2018</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <th scope="row">6</th>
            <td><img src="{{ asset('img/Atomic-Habits.jpeg') }}" alt="Atomic Habits" class="img-thumbnail" style="width: 100px;"></td>
            <td>Atomic Habits</td>
            <td>Peninsula</td>
            <td>2018</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <tr>
            <th scope="row">7</th>
            <td><img src="{{ asset('img/psychology-of-money.jpg') }}" alt="Psikologi Uang" class="img-thumbnail" style="width: 100px;"></td>
            <td>Psychology Of Money</td>
            <td>Gramedia</td>
            <td>2020</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" class="btn btn-info btn-sm">View</button>
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
    </tbody>
</table>

</div>
@endsection

@extends('layout.header')


