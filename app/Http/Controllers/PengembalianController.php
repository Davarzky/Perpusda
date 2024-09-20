<?php
namespace App\Http\Controllers;

use App\Models\PengembalianModel;
use App\Models\DetailPengembalianModel;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = PengembalianModel::with('detailPengembalian')->paginate(10);
        return view('pages.pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        return view('pages.pengembalian.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'tanggal_kembali' => 'required|date',
            'detail_pengembalian.*.kode_buku' => 'required',
            'detail_pengembalian.*.jumlah' => 'required|integer|min:1',
        ]);

        $pengembalian = PengembalianModel::create([
            'nisn' => $request->nisn,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        foreach ($request->detail_pengembalian as $detail) {
            DetailPengembalianModel::create([
                'id_pengembalian' => $pengembalian->id,
                'kode_buku' => $detail['kode_buku'],
                'jumlah' => $detail['jumlah'],
            ]);
        }

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil disimpan.');
    }

    public function edit($id)
    {
        $pengembalian = PengembalianModel::with('detailPengembalian')->findOrFail($id);
        return view('pages.pengembalian.edit', compact('pengembalian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required',
            'tanggal_kembali' => 'required|date',
            'detail_pengembalian.*.kode_buku' => 'required',
            'detail_pengembalian.*.jumlah' => 'required|integer|min:1',
        ]);

        $pengembalian = PengembalianModel::findOrFail($id);
        $pengembalian->update([
            'nisn' => $request->nisn,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        // Hapus detail lama dan simpan yang baru
        $pengembalian->detailPengembalian()->delete();
        foreach ($request->detail_pengembalian as $detail) {
            DetailPengembalianModel::create([
                'id_pengembalian' => $pengembalian->id,
                'kode_buku' => $detail['kode_buku'],
                'jumlah' => $detail['jumlah'],
            ]);
        }

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengembalian = PengembalianModel::findOrFail($id);
        $pengembalian->detailPengembalian()->delete();
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dihapus.');
    }

    public function show($id)
    {
        $pengembalian = PengembalianModel::with('detailPengembalian')->findOrFail($id);
        return view('pages.pengembalian.detail', compact('pengembalian'));
    }
}
