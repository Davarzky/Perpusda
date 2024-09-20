<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanModel;
use App\Models\DetailPeminjamanModel;
use App\Models\SiswaModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = PeminjamanModel::with('detailPeminjaman')->paginate(5); // Ganti 10 dengan jumlah item per halaman yang diinginkan
        return view('pages.peminjaman.index', compact('peminjaman'));
    }
    

    public function create()
    {
        return view('pages.peminjaman.tambah');
    }

    public function store(Request $request)
    {
        Log::info($request->all());

        // Validasi input
        $request->validate([
            'nisn' => 'required|exists:siswas,nis',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'detail_peminjaman.*.kode_buku' => 'required',
            'detail_peminjaman.*.jumlah' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            // Simpan data peminjaman
            $peminjaman = PeminjamanModel::create([
                'nisn' => $request->nisn, // pastikan ini sesuai dengan data siswas
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
            ]);
            

            // Simpan detail peminjaman
            foreach ($request->detail_peminjaman as $detail) {
                DetailPeminjamanModel::create([
                    'id_peminjaman' => $peminjaman->id, // pastikan ini merujuk pada id peminjaman yang baru disimpan
                    'kode_buku' => $detail['kode_buku'],
                    'jumlah' => $detail['jumlah'],
                ]);
            }
            

            DB::commit();
            return response()->json(['message' => 'Peminjaman berhasil disimpan.'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw ValidationException::withMessages(['error' => 'Terjadi kesalahan saat menyimpan data. ' . $e->getMessage()]);
        }
        
    }
    public function showDetail($id)
    {
        // Ambil data peminjaman beserta detailnya
        $peminjaman = PeminjamanModel::with('detailPeminjaman.buku')->findOrFail($id);
    
        // Tampilkan view dengan data peminjaman
        return view('pages.peminjaman.detail', compact('peminjaman'));
    }
    public function destroy($id)
    {
        // Hapus detail peminjaman terkait
        DetailPeminjamanModel::where('id_peminjaman', $id)->delete();
    
        // Hapus peminjaman
        PeminjamanModel::destroy($id);
    
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }
    

    

    

}
