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
    // Στέλνει πρόσκληση στον leader της επιλεγμένης ομάδας
    public function sendInvitation(Request $request, Team $team)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);
        
        $user = User::findOrFail($request->user_id);

        // Έλεγχος: είναι ήδη σε ομάδα;
        if (!is_null($user->team_id)) {
            return back()->with('error', 'Ο χρήστης ανήκει ήδη σε ομάδα.');
        }

        // Έλεγχος: υπάρχει ήδη pending πρόσκληση;
        $existingInvitation = TeamInvitation::where('team_id', $team->id)
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        if ($existingInvitation) {
            return back()->with('error', 'Ο χρήστης έχει ήδη πρόσκληση από την ομάδα.');
        }

        // Δημιουργία πρόσκλησης
        TeamInvitation::create([
            'team_id' => $team->id,
            'user_id' => $user->id,
            'leader_id' => auth()->user()->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Η πρόσκληση στάλθηκε με επιτυχία!');
    }

    public function acceptInvitation($invitationId)
    {
        $invitation = TeamInvitation::findOrFail($invitationId);
        logger("o user dexetai tin prosklisi kai mpainei stin omada");
        if ($invitation->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Δεν έχεις δικαίωμα να αποδεχτείς αυτή την πρόσκληση.');
        }

        if ($invitation->status !== 'pending') {
            return redirect()->back()->with('error', 'Αυτή η πρόσκληση δεν είναι πλέον ενεργή.');
        }

        $invitation->status = 'accepted';
        $invitation->save();

        $user = $invitation->user;
        $user->team_id = $invitation->team_id;
        $user->save();

        $team = $invitation->team;
        $team->members()->attach($user->id, ['role' => 'member']);

        return redirect()->route('dashboard')->with('success', 'Αποδέχθηκες την πρόσκληση και μπήκες στην ομάδα!');
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
