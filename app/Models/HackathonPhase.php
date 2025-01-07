<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HackathonPhase extends Model
{
    protected $fillable = ['phase_name', 'end_date'];

    protected $dates = ['end_date'];


}
