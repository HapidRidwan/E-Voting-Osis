<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Vote;

#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    
    /**
     * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected $fillable = [
        'nis',
        'name',
        'username',
        'kelas',
        'password',
        'role',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
        public function vote(): HasOne
    {
        return $this->hasOne(Vote::class);
    }

}
