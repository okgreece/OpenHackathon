<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Team extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function members()
    {
        return $this->hasMany(TeamMember::class, 'team_id');
    }

    public function leader()
    {
        return $this->hasOne(TeamMember::class)->where('role', 'leader');
    }
}
