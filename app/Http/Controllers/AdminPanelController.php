<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminPanelController extends Controller
{
    public function index()
    {
        // Λήψη όλων των ομάδων
        $teams = Team::all();

        // Λήψη όλων των μελών και τα συσχετίζουμε με τις ομάδες τους
        $members = TeamMember::with('user', 'team')->get();

        return view('admin.panel', compact('teams', 'members'));
    }

    public function deleteTeam($id)
    {
        // Εύρεση της ομάδας
        $team = Team::findOrFail($id);

        // Διαγραφή όλων των μελών της ομάδας πρώτα
        $team->members()->delete();

        // Διαγραφή της ομάδας
        $team->delete();

        return back()->with('success', 'Η ομάδα διαγράφηκε επιτυχώς.');
    }

    // Μέθοδος για διαγραφή μέλους
    public function deleteMember($id)
    {
        // Εύρεση του μέλους
        $member = TeamMember::findOrFail($id);

        // Διαγραφή του μέλους από την ομάδα
        $member->delete();

        return back()->with('success', 'Το μέλος διαγράφηκε επιτυχώς.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
