<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Λήψη του συνδεδεμένου χρήστη
        $user = Auth::user();

        // Έλεγχος αν ο χρήστης έχει ήδη ομάδα
        if ($user->team_id && $user->team_id != 0) {
            // Αν ο χρήστης έχει ομάδα, ανακατευθύνουμε στην κεντρική σελίδα της ομάδας του
            $team = Team::find($user->team_id);
            return redirect()->route('teams.panel', ['team' => $user->team_id]);
        }

        // Αν δεν έχει ομάδα, πρέπει να περάσουμε τις διαθέσιμες ομάδες στο view
        $teams = Team::all();  // Παίρνουμε όλες τις ομάδες από τη βάση δεδομένων
        return view('dashboard', compact('teams'));
    }
}