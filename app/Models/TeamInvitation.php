<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TeamInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'user_id',
        'leader_id',
        'status'
    ];

    // Σχέση με την ομάδα
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Σχέση με τον χρήστη που έκανε την αίτηση
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Σχέση με τον ηγέτη της ομάδας
    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id');
    }

    public static function getStatus($teamId, $userId)
    {
        return self::where('team_id', $teamId)
                    ->where('user_id', $userId)
                    ->orderBy('created_at', 'desc')
                    ->value('status');
    }
}
