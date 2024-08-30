<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelass'; 
    protected $primaryKey = 'kode_kelas'; 
    public $incrementing = false; 
    protected $guarded = [];
}
