<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primaryKey = 'kode_kategori';
    public $timestamps = true;
    protected $fillable = ['kode_kategori', 'nama_kategori'];

    public function bukus()
    {
        return $this->hasMany(BukuModel::class, 'kode_kategori', 'kode_kategori');
    }
}
