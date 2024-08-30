<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;


Route::get('asade', function(){
    return view('layout');
});
Route::get('/dashboard', function(){
    return view('pages.dashboard');
});


// Route Profile
Route::get('/profile', function(){
    return view('pages.profile');
});

// Route Siswa
Route::get('/data-siswa', [SiswaController::class,'main']);
Route::get('/tambah', [SiswaController::class,'add']);
Route::post('/tambah', [SiswaController::class,'save']);
Route::get('/edit/{nis}', [SiswaController::class,'edit']);
Route::post('/edit/{nis}', [SiswaController::class,'update']);
Route::get('/delete/{nis}', [SiswaController::class,'delete']);


// Route Buku
Route::get('/data-buku', function(){
    return view('pages.buku.index');
});


// Route Peminjaman
Route::get('/data-peminjaman', function(){
    return view('pages.peminjaman.index');
});
Route::get('/create-peminjaman', function(){
    return view('pages.peminjaman.create');
});


// Route Pengembalian
Route::get('/data-pengembalian', function(){
    return view('pages.pengembalian.index');
});

// Route Laporan
Route::get('/data-laporan', function(){
    return view();
});

// Route User Page
Route::get('/',function(){
    return view('pages.user.index');
});