<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}