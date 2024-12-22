<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Έλεγχος αν ο χρήστης έχει ήδη ομάδα
        if ($user->team_id && $user->team_id != 0) {

            $team = Team::find($user->team_id);
            return redirect()->route('teams.panel', ['team' => $user->team_id]);
        }
        $teamRequestStatus = TeamRequest::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->first();

        $rejectionReason = $teamRequestStatus && $teamRequestStatus->status == 'rejected'
            ? $teamRequestStatus->rejection_reason
            : null;

        $teams = Team::all();  
        return view('dashboard', compact('teams','teamRequestStatus','rejectionReason'));
    }
}