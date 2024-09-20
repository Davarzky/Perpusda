<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengembalianModel extends Model
{
    use HasFactory;
    protected $table = 'detail_pengembalians';

    protected $fillable = ['id_pengembalian', 'kode_buku', 'jumlah'];

    public function pengembalian()
    {
        return $this->belongsTo(PengembalianModel::class, 'id_pengembalian', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'kode_buku', 'kode_buku');
    }
}
