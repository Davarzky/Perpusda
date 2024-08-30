<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model


{
    use HasFactory;

    protected $table = 'siswas'; 
    protected $primaryKey = 'nis'; 
    public $incrementing = false; 
    protected $guarded = [];
}
