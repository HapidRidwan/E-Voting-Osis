<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_urut',
        'ketua',
        'wakil',
        'foto_ketua',
        'foto_wakil',
        'visi',
        'misi',
    ];
}