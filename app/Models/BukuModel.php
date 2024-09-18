<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;


    protected $table = 'bukus';
    protected $primaryKey = 'kode_buku'; 
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'kode_buku',
        'judul',
        'penerbit',
        'tahun_terbit',
        'kode_kategori',
        'gambar',// Kolom untuk menyimpan path gambar
    ];
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kode_kategori', 'kode_kategori');
    }
}
