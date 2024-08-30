<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function main(){
        $data_siswa = SiswaModel::all();
        return view('pages.siswa.index', [
            'data_siswa' => $data_siswa
        ]);
    }

    public function add(){
        return view('pages.siswa.tambah');
    }

    public function save(Request $request){
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'kelas' => 'required'
        ]);

        SiswaModel::create($request->all());

        return redirect('pages.siswa.index');
    }

    public function edit($nis){
        $siswa = SiswaModel::findOrFail($nis);
        return view('siswa.update', [
            'dataSiswa' => $siswa
        ]);
    }

    public function update(Request $request, $nis){
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'tanggal_lahir' => 'required',
            'kelas' => 'required'
        ]);

        $siswa = SiswaModel::findOrFail($nis);
        $siswa->update($request->all());

        return redirect('pages.siswa.index');
    }

    public function delete($nis){
        $siswa = SiswaModel::findOrFail($nis);
        $siswa->delete();
        return redirect('pages.siswa.index');
    }
}
