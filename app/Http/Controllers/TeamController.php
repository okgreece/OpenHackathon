<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\TeamMember;


class TeamController extends Controller
{
    // Εμφάνιση της φόρμας για τη δημιουργία ομάδας
    public function create()
    {
        return view('teams.create');
    }

    // Αποθήκευση της νέας ομάδας
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Δημιουργία νέας ομάδας
        $team = Team::create([
            'name' => $request->name,
            'user_id' => auth()->id(), // Αν η ομάδα ανήκει στον τρέχοντα χρήστη
        ]);

        TeamMember::create([
            'team_id' => $team->id,
            'user_id' => auth()->id(), // Ο χρήστης που δημιούργησε την ομάδα
            'role' => 'leader', // Ο χρήστης γίνεται leader
            'joined_at' => now(), // Η ημερομηνία που εντάχθηκε στην ομάδα
        ]);

        $user = auth()->user();
        $user->team_id = $team->id;
        $user->save();

        // Επιστροφή στην dashboard ή άλλη σελίδα
        return redirect()->route('dashboard')->with('success', 'Η ομάδα δημιουργήθηκε με επιτυχία.');
    }

    // Εμφάνιση των ομάδων για να ενταχθεί ο χρήστης
    public function join()
    {
        $teams = Team::all(); // Παίρνουμε όλες τις ομάδες ή μπορείς να βάλεις φίλτρο
        return view('teams.join', compact('teams'));
    }

    public function showPanel(Team $team)
    {
        // Ελέγχουμε αν ο χρήστης ανήκει στην ομάδα που ζητήθηκε
        if (auth()->user()->team_id != $team->id) {
            return redirect()->route('dashboard')->with('error', 'Δεν έχεις πρόσβαση σε αυτήν την ομάδα.');
        }


        return view('teams.panel', compact('team'));
    }
}