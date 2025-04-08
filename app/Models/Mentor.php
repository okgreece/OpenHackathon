<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mentor extends Authenticatable
{

    use HasFactory;
    protected $guard = 'mentor';
    protected $hidden = ['password'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bio',
        'team_id',
    ];

    public function team()
    {
        return $this->hasOne(Team::class);
    }
}
