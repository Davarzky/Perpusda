<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    // public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nisn',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];

    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'nisn', 'nis');
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjamanModel::class, 'id_peminjaman', 'id');
    }
}
