<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $kategoris = KategoriModel::all();

        $kategoriBuku = [];

        foreach ($kategoris as $kategori) {
            $kategoriBuku[$kategori->kode_kategori] = BukuModel::where('kode_kategori', $kategori->kode_kategori)
                ->limit(6) // Batasi 6 buku per kategori
                ->get();
        }

        return view('pages.user.index', compact('kategoris', 'kategoriBuku'));
    }

    public function showCategory($kode_kategori)
    {
        $kategori = KategoriModel::findOrFail($kode_kategori);
        $buku = BukuModel::where('kode_kategori', $kode_kategori)->get();

        return view('pages.user.category', compact('kategori', 'buku'));
    }
}
