<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamRequest extends Model
{
    protected $fillable = [
        'user_id', 'team_name', 'description', 'environmental_data', 'status', 'rejection_reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
