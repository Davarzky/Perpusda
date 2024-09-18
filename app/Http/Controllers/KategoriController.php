<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\BukuModel;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategoris = KategoriModel::with('bukus')->get();
        return view('pages.kategori.index', compact('kategoris'));
    }

    public function show($kode_kategori)
    {
        $kategori = KategoriModel::with('bukus')->where('kode_kategori', $kode_kategori)->firstOrFail();
        return view('pages.kategori.show', compact('kategori'));
    }
}
