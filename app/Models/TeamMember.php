<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'user_id',
        'role',
        'joined_at',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Αυτή η μέθοδος δηλώνει τη σχέση με το μοντέλο Team
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

}
