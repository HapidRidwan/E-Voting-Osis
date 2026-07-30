<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'username',
        'password',
        'has_voted',
    ];

    protected $hidden = [
        'password',
    ];
}