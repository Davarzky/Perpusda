<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjamanModel extends Model
{
    use HasFactory;
    protected $table = 'detail_peminjamans';

    protected $fillable = ['id_peminjaman', 'kode_buku', 'jumlah'];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanModel::class, 'id_peminjaman', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'kode_buku', 'kode_buku');
    }
}
