<?php
namespace App\Http\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function main(){
        // Tambahkan pagination (misalnya 10 siswa per halaman)
        $data_siswa = SiswaModel::with('kelas')->paginate(10); 
        return view('pages.siswa.index', [
            'data_siswa' => $data_siswa
        ]);
    }
    

    public function add(){
        $kelass = KelasModel::all(); // Fetch all classes for the dropdown
        return view('/pages.siswa.tambah', [
            'kelass' => $kelass
        ]);
    }

    public function save(Request $request){
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'kode_kelas' => 'required' // Ensure you use `kode_kelas` here
        ]);

        SiswaModel::create($request->all());

        return redirect('/data-siswa');
    }

    public function edit($nis){
        $siswa = SiswaModel::findOrFail($nis);
        $kelass = KelasModel::all(); // Fetch all classes for the dropdown
        return view('/pages.siswa.edit', [ // Ensure this matches your Blade template path
            'dataSiswa' => $siswa,
            'kelass' => $kelass
        ]);
    }

    public function update(Request $request, $nis){
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'tanggal_lahir' => 'required|date',
            'kode_kelas' => 'required' 
        ]);

        $siswa = SiswaModel::findOrFail($nis);
        $siswa->update($request->except('_token')); // Avoid updating the NIS field

        return redirect('/data-siswa');
    }

    public function delete($nis){
        $siswa = SiswaModel::findOrFail($nis);
        $siswa->delete();
        return redirect('/data-siswa');
    }
    public function show($nis)
{
    $siswa = SiswaModel::where('nis', $nis)->first();

    if ($siswa) {
        return response()->json($siswa);
    } else {
        return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
    }
}
}
