<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KelasModel;

class SiswaModel extends Model


{
    use HasFactory;

    protected $table = 'siswas'; 
    protected $primaryKey = 'nis'; 
    public $incrementing = false; 
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'kode_kelas', 'kode_kelas');
    }
}
