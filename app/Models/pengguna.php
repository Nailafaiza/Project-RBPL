<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'pengguna';

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden=[
        'password',
    ];
}
