<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use Illuminate\Support\Facades\Route;

// Halaman User
Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/kategori/{kode_kategori}', [UserController::class, 'showCategory'])->name('kategori.show');


Route::get('/dashboard', function(){
    return view('pages.dashboard');
});


// Route Profile


// Route Siswa
Route::get('/data-siswa', [SiswaController::class,'main']);
Route::get('/tambah', [SiswaController::class,'add']);
Route::post('/tambah', [SiswaController::class,'save']);
Route::get('/edit/{nis}', [SiswaController::class,'edit']);
Route::post('/edit/{nis}', [SiswaController::class,'update']);
Route::get('/delete/{nis}', [SiswaController::class,'delete']);
Route::get('/data-siswa/{nis}', [SiswaController::class, 'show']);


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
Route::get('buku/{kode_buku}/show', [BukuController::class, 'show'])->name('buku.show');
Route::get('/search', [BukuController::class, 'search'])->name('buku.search');




// Route Admin
Route::get('/admin/profile', [AdminController::class, 'index'])->name('admin.index');

// Route untuk memperbarui data profil admin
Route::put('/admin/profile', [AdminController::class, 'update'])->name('admin.update');
// Route Login

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/peminjaman/tambah', [PeminjamanController::class, 'create'])->name('peminjaman.create');

// Route to store a new peminjaman
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('/peminjaman/delete/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.delete');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/{id}', [PeminjamanController::class, 'showDetail'])->name('peminjaman.detail');

// Route Pengembalian 
Route::prefix('pengembalian')->group(function () {
    Route::get('/', [PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::get('/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
    Route::post('/', [PengembalianController::class, 'store'])->name('pengembalian.store');
    Route::get('/{id}/edit', [PengembalianController::class, 'edit'])->name('pengembalian.edit');
    Route::put('/{id}', [PengembalianController::class, 'update'])->name('pengembalian.update');
    Route::delete('/{id}', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');
    Route::get('/{id}', [PengembalianController::class, 'show'])->name('pengembalian.show');
});




Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', function() {
        return view('pages.dashboard');
    })->name('dashboard');

    // Rute admin lainnya...
});
// Route Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{kode_kategori}', [KategoriController::class, 'show'])->name('kategori.show');
// Route Peminjaman


// Route Pengembalian


// Route Laporan
Route::get('/data-laporan', function(){
    return view();
});

// Route User Page
