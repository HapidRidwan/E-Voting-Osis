<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'nomor_urut',
        'ketua',
        'wakil',
        'foto_ketua',
        'foto_wakil',
        'visi',
        'misi',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function vote()
    {
        return $this->hasMany(\App\Models\Vote::class);
    }
}

