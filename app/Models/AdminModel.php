<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory, Authenticatable;

    protected $table = 'admins'; 
    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
}