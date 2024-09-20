<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianModel extends Model
{
    use HasFactory;
    protected $table = 'pengembalians';

    protected $fillable = ['nisn', 'tanggal_kembali'];

    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'nis', 'nisn');
    }

    public function detailPengembalian()
    {
        return $this->hasMany(DetailPengembalianModel::class, 'id_pengembalian', 'id');
    }
}
