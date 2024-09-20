<?php
namespace App\Http\Controllers;

use App\Models\KelasModel;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Display the list of classes
    public function main()
    {
        $data_kelas =  KelasModel::paginate(8); // Fetch all classes
    return view('pages.kelas.index', [
        'data_kelas' => $data_kelas // Pass variable to view
    ]);
    }
    
    // Show the form for creating a new class
    public function add()
{
    return view('pages.kelas.tambah');
}

public function save(Request $request)
{
    $request->validate([
        'tingkat' => 'required',
        'jurusan' => 'required',
    ]);

    KelasModel::create($request->all()); // Ensure you are passing data correctly

    return redirect('/data-kelas')->with('success', 'Data kelas berhasil ditambahkan');
}
    
    // Show the form for editing the specified class
    public function edit($kode_kelas)
    {
        $kelas = KelasModel::findOrFail($kode_kelas);
        return view('pages.kelas.edit', [
            'kelas' => $kelas
        ]);
    }
    
    // Update the specified class in the database
    public function update(Request $request, $kode_kelas)
    {
        $request->validate([
            'tingkat' => 'required',
            'jurusan' => 'required',
        ]);
    
        $kelas = KelasModel::findOrFail($kode_kelas);
        $kelas->update([
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
        ]);
    
        return redirect('/data-kelas')->with('success', 'Data kelas berhasil diupdate');
    }
    
    // Remove the specified class from the database
    public function delete($kode_kelas)
    {
        $kelas = KelasModel::findOrFail($kode_kelas);
        $kelas->delete();
        return redirect('/data-kelas')->with('success', 'Data kelas berhasil dihapus');
    }
}
