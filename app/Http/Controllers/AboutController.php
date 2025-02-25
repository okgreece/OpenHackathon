<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HackathonPhase;
use App\Models\TeamMember;
use App\Models\Team;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }

    public function aboutShowPanel(Team $team)
    {
        $currentPhase = HackathonPhase::where('end_date', '>=', now())->orderBy('end_date')->first();
        $phases = HackathonPhase::orderBy('end_date')->get();
        $members = TeamMember::with('user', 'team')->get();

        return view('about', compact('team','currentPhase','phases','members'));
    }
}
