<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\HackathonPhase;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team = Team::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        TeamMember::create([
            'team_id' => $team->id,
            'user_id' => auth()->id(),
            'role' => 'leader',
            'joined_at' => now(),
        ]);

        $user = auth()->user();
        $user->team_id = $team->id;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Η ομάδα δημιουργήθηκε με επιτυχία.');
    }

    public function join()
    {
        $teams = Team::all(); 
        return view('teams.join', compact('teams'));
    }

    public function showPanel(Team $team)
    {
        if (auth()->user()->team_id != $team->id) {
            return redirect()->route('dashboard')->with('error', 'Δεν έχεις πρόσβαση σε αυτήν την ομάδα.');
        }

        $currentPhase = HackathonPhase::where('end_date', '>=', now())->orderBy('end_date')->first();
        $phases = HackathonPhase::orderBy('end_date')->get();
        $members = TeamMember::with('user', 'team')->get();

        return view('teams.panel', compact('team','currentPhase','phases','members'));
    }
}