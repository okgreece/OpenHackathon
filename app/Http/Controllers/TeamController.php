<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\HackathonPhase;
use App\Models\TeamRequest;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function create()
    {
        return view('teams.create');
    }
    
    public function store(Request $request)
    {
        // Validate τα δεδομένα
        $request->validate([
            'team_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'environmental_data' => 'nullable|string|max:255',
        ]);
    
       
        $teamRequest = TeamRequest::create([
            'user_id' => auth()->id(),
            'team_name' => $request->team_name,
            'description' => $request->description,
            'environmental_data' => $request->environmental_data,
            'status' => 'pending',
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Η αίτηση δημιουργίας ομάδας καταχωρήθηκε και είναι σε κατάσταση αναμονής.');
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