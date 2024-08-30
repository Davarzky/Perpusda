@extends('layout.footer')


@extends('layout.content')
@section('content')

@extends('layout.footer')

@extends('layout.content')
@section('content')
<div class="container">
    <h2>Detail Pengembalian</h2>
    
    <a href="/create-pengembalian"><button type="button" class="btn btn-primary mb-3">Tambah Pengembalian</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID pengembalian</th>
                <th scope="col">Judul</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>PMB001</td>
                <td>Dilan 1990</td>
                <td>2</td>
                <td>
                    <a href="/view-pengembalian/PMB001"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-pengembalian/PMB001" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>PMB002</td>
                <td>Filosofi Teras</td>
                <td>1</td>
                <td>
                    <a href="/view-pengembalian/PMB002"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-pengembalian/PMB002" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>PMB003</td>
                <td>Atomic Habits</td>
                <td>3</td>
                <td>
                    <a href="/view-pengembalian/PMB003"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-pengembalian/PMB003" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>PMB004</td>
                <td>Psychology Of Money</td>
                <td>1</td>
                <td>
                    <a href="/view-pengembalian/PMB004"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-pengembalian/PMB004" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>PMB005</td>
                <td>Milea Suara dari Dilan</td>
                <td>2</td>
                <td>
                    <a href="/view-pengembalian/PMB005"><button type="button" class="btn btn-info btn-sm">View</button></a>
                    <a href="/delete-pengembalian/PMB005" onclick="return confirm('Are you sure you want to delete this item?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@extends('layout.header')


@endsection

@extends('layout.header')