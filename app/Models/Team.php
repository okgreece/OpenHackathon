<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Team extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'environmental_data',
        'user_id',
        'phase_completed',
        'github_link',     
        'github_link',
        'video_link',
        'app_description',
    ];
    
    protected $dates = ['created_at', 'updated_at'];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'team_members')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function leader()
    {
        return $this->hasOne(TeamMember::class)->where('role', 'leader');
    }

     public function invitations()
    {
        return $this->hasMany(TeamInvitation::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}
