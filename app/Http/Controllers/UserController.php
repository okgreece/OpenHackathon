<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDashboard()
    {
        // Ελέγχουμε αν ο χρήστης ανήκει σε ομάδα
        $user = auth()->user();
        
        if ($user->team_id && $user->team_id != 0) {
            // Αν είναι σε ομάδα, ανακατευθύνουμε στο panel της ομάδας
            return redirect()->route('team.panel');
        }

        // Αν δεν είναι σε ομάδα, επιστρέφουμε στο dashboard
        return view('dashboard'); // Επιστρέφουμε το dashboard.blade.php
    }
}
