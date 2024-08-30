@extends('layout.footer')

@extends('layout.content')
@section('content')
<div class="container">
    <h2>Detail Peminjaman</h2>
    
    <a href="/create-peminjaman"><button type="button" class="btn btn-primary mb-3">Tambah Peminjaman</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Peminjaman</th>
                <th scope="col">Judul</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>PMJ001</td>
                <td>Dilan 1990</td>
                <td>2</td>
                <td>
                    <a href="/view-peminjaman/PMJ001"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-peminjaman/PMJ001" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>PMJ002</td>
                <td>Filosofi Teras</td>
                <td>1</td>
                <td>
                    <a href="/view-peminjaman/PMJ002"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-peminjaman/PMJ002" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>PMJ003</td>
                <td>Atomic Habits</td>
                <td>3</td>
                <td>
                    <a href="/view-peminjaman/PMJ003"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-peminjaman/PMJ003" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>PMJ004</td>
                <td>Psychology Of Money</td>
                <td>1</td>
                <td>
                    <a href="/view-peminjaman/PMJ004"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-peminjaman/PMJ004" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>PMJ005</td>
                <td>Milea Suara dari Dilan</td>
                <td>2</td>
                <td>
                    <a href="/view-peminjaman/PMJ005"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-peminjaman/PMJ005" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@extends('layout.header')
