<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriModel;

class BukuController extends Controller
{
    public function index()
    {
        $buku = BukuModel::all();
        return view('pages.buku.index', compact('buku'));
    }


    public function create()
    {
        $kategoris = KategoriModel::all();  // Fetch all categories
        return view('pages.buku.tambah', compact('kategoris'));
    }

    public function store(Request $request)
{   
    $request->validate([
        'kode_buku' => 'required|unique:bukus,kode_buku',  // Menambahkan validasi untuk kode_buku
        'judul' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'kode_kategori' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('images', 'public');
    }

    BukuModel::create([
        'kode_buku' => $request->kode_buku,  // Menyimpan kode_buku
        'judul' => $request->judul,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'kode_kategori' => $request->kode_kategori,
        'gambar' => $gambarPath,
    ]);

    return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
}
public function edit($kode_buku)
{
    $buku = BukuModel::findOrFail($kode_buku);
    $kategoris = KategoriModel::all();
    return view('pages.buku.edit', compact('buku', 'kategoris'));
}

public function update(Request $request, $kode_buku)
{
    $request->validate([
        'judul' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'kode_kategori' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $buku = BukuModel::findOrFail($kode_buku);

    $gambarPath = $buku->gambar;
    if ($request->hasFile('gambar')) {
        if ($gambarPath) {
            Storage::disk('public')->delete($gambarPath);
        }
        $gambarPath = $request->file('gambar')->store('images', 'public');
    }

    $buku->update([
        'judul' => $request->judul,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'kode_kategori' => $request->kode_kategori,
        'gambar' => $gambarPath,
    ]);

    return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate');
}

    public function destroy($kode_buku)
    {
        $buku = BukuModel::findOrFail($kode_buku);
        if ($buku->gambar) {
            Storage::disk('public')->delete($buku->gambar);
        }
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
    public function detail($kode_buku)
    {
        // Ambil data buku berdasarkan kode_buku
        $buku = BukuModel::with('kategori')->where('kode_buku', $kode_buku)->firstOrFail();
        
        // Kirim data buku ke view detail
        return view('pages.user.detail', compact('buku'));
    }
    public function search(Request $request)
{
    $query = $request->input('query');

    // Debugging query
    // dd($query); // Uncomment this line to see the query being searched

    // Cari buku berdasarkan judul
    $buku = BukuModel::where('judul', 'LIKE', "%{$query}%")->get();

    // Debugging buku
    // dd($buku); // Uncomment this line to see the result

    // Ambil kategori untuk ditampilkan di view
    $kategoris = KategoriModel::all();
    $kategoriBuku = $kategoris->mapWithKeys(function ($kategori) {
        return [$kategori->kode_kategori => BukuModel::where('kode_kategori', $kategori->kode_kategori)->get()];
    });

    return view('pages.user.search', compact('buku', 'kategoris', 'kategoriBuku'));
}

 

}
