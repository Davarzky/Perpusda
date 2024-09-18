<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiswaModel;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelass'; 
    protected $primaryKey = 'kode_kelas'; 
    public $incrementing = true; 
    protected $guarded = [];

    public function siswas()
    {
        return $this->hasMany(SiswaModel::class, 'kode_kelas', 'kode_kelas');
    }
}

