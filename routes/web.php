<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

// Halaman User
Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/kategori/{kode_kategori}', [UserController::class, 'showCategory'])->name('kategori.show');


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


// Route Kelas
Route::get('/data-kelas', [KelasController::class, 'main']); // Display class data
Route::get('/kelas/tambah', [KelasController::class, 'add']); // Show form to add class
Route::post('/kelas/save', [KelasController::class, 'save']); // Save new class data
Route::get('/kelas/edit/{kode_kelas}', [KelasController::class, 'edit']); // Show form to edit class
Route::put('/kelas/{kode_kelas}', [KelasController::class, 'update']); // Update class data
Route::delete('/kelas/delete/{kode_kelas}', [KelasController::class, 'delete']);



// Route Buku
Route::get('data-buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('buku/{kode_buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('buku/{kode_buku}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('buku/{kode_buku}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('buku/{kode_buku}', [BukuController::class, 'detail'])->name('buku.detail');
Route::get('/search', [BukuController::class, 'search'])->name('buku.search');




// Route Admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'index'])->name('admin.index');
    Route::put('/admin/profile', [AdminController::class, 'update'])->name('admin.profile.update');
});
// Route Login

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

// Route Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{kode_kategori}', [KategoriController::class, 'show'])->name('kategori.show');
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
