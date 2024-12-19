<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamInvitationController extends Controller
{
    // Στέλνει πρόσκληση στον ηγέτη της επιλεγμένης ομάδας
    public function sendInvitation($teamId)
    {
        $team = Team::findOrFail($teamId);

        // Ελέγχουμε αν ο χρήστης ανήκει ήδη σε κάποια ομάδα
        if (Auth::user()->team_id !== null) {
            return redirect()->back()->with('error', 'Δεν μπορείτε να στείλετε πρόσκληση γιατί ήδη ανήκετε σε ομάδα');
        }

        // Στέλνουμε την πρόσκληση στον ηγέτη της ομάδας
        $invitation = TeamInvitation::create([
            'team_id' => $team->id,
            'user_id' => Auth::id(),
            'leader_id' => $team->user_id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Η πρόσκληση αποστάλθηκε στον ηγέτη της ομάδας');
    }

    public function acceptInvitation($invitationId)
    {
        $invitation = TeamInvitation::findOrFail($invitationId);

        if ($invitation->leader_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Μόνο ο leader μπορεί να αποδεχτεί την πρόσκληση');
        }

        $invitation->status = 'accepted';
        $invitation->save();

        $team = $invitation->team;
        $team->members()->attach($invitation->user_id, ['role' => 'member']);

        $user = $invitation->user;
        $user->team_id = $team->id;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Η πρόσκληση αποδεχτήκε και ο χρήστης προστέθηκε στην ομάδα');
    }

    public function rejectInvitation($invitationId)
    {
        $invitation = TeamInvitation::findOrFail($invitationId);

        if ($invitation->leader_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Μόνο ο leader μπορεί να απορρίψει την πρόσκληση');
        }

        // Απόρριψη πρόσκλησης
        $invitation->status = 'rejected';
        $invitation->save();

        return redirect()->route('dashboard')->with('success', 'Η πρόσκληση απορρίφθηκε');
    }
}
