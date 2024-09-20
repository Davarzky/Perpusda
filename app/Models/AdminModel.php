<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = [
        'username',
        'password',
        // Tambahkan kolom lain yang diperlukan
    ];

    // Kita tidak menggunakan $hidden karena password disimpan sebagai teks biasa
    // protected $hidden = ['password', 'remember_token'];

    // Override metode getAuthPassword untuk menggunakan password teks biasa
    public function getAuthPassword()
    {
        return $this->password;
    }
}