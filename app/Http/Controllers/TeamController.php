<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\User;
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
            'environmental_data' => 'array|max:3', // Επιτρέπει έως 3 επιλογές
            'environmental_data.*' => 'string|in:climate_change,air_quality,water_pollution,biodiversity,energy_consumption',
        ]);

        // Δημιουργία νέου αιτήματος ομάδας
        $teamRequest = TeamRequest::create([
            'user_id' => auth()->id(),
            'team_name' => $request->team_name,
            'description' => $request->description,
            'environmental_data' => json_encode($request->environmental_data),
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
        $mentors = Mentor::whereNull('team_id')->get();

        if (auth()->user()->team_id != $team->id) {
            return redirect()->route('dashboard')->with('error', 'Δεν έχεις πρόσβαση σε αυτήν την ομάδα.');
        }

        $currentPhase = HackathonPhase::where('end_date', '>=', now())->orderBy('end_date')->first();
        $phases = HackathonPhase::orderBy('end_date')->get();

        $members = TeamMember::with('user')->where('team_id', $team->id)->get();

        // Φέρνουμε μόνο τις προσκλήσεις που έστειλε αυτός ο leader
        $sentInvitations = $team->invitations()->where('leader_id', Auth::id())->get();

        // Όλους τους χρήστες που δεν έχουν ομάδα (για να στείλεις πρόσκληση)
        $users = User::whereNull('team_id')->get();

        return view('teams.panel', compact('team', 'currentPhase', 'phases', 'members', 'sentInvitations', 'users','mentors'));
    }


    public function completePhase(Request $request, $teamId)
    {
        $request->validate([
            'github_link' => 'required|url',
            'video_link' => 'required|url',
            'app_description' => 'required|string|max:1000',
        ]);

        $team = Team::findOrFail($teamId);

        // Μόνο ο leader μπορεί να ολοκληρώσει
        // if ($team->user_id !== auth()->id()) {
        //     dd('Μόνο ο αρχηγός της ομάδας μπορεί να ολοκληρώσει τη φάση.');
        // }

        $team->update([
            'phase_completed' => true,
            'github_link' => $request->input('github_link'),
            'video_link' => $request->input('video_link'),
            'app_description' => $request->input('app_description'),
        ]);

        return redirect()->back()->with('success', 'Η φάση ολοκληρώθηκε με επιτυχία.');
    }

    public function send(Request $request, Team $team)
    {
        if ($team->user_id != auth()->user()->id) {
            abort(403);
        }

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Ο χρήστης δεν βρέθηκε.');
        }

        if ($user->team_id) {  
            return redirect()->back()->with('error', 'Ο χρήστης είναι ήδη μέλος άλλης ομάδας.');
        }

        if ($team->members->contains($user->id) || $team->invitations()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Ο χρήστης είναι ήδη μέλος ή έχει ήδη πρόσκληση.');
        }

        $team->invitations()->create([
            'user_id' => $user->id,
            'leader_id' => auth()->user()->id,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Η πρόσκληση στάλθηκε επιτυχώς!');
    }

    public function cancel(TeamInvitation $invitation)
    {
        $team = $invitation->team;
        logger("o admin akironei tin prosklisi");
        
        // Έλεγχος αν είναι Leader
        if ($team->user_id != auth()->user()->id) {
            abort(403);
        }

        $invitation->delete();

        return redirect()->back()->with('success', 'Η πρόσκληση ακυρώθηκε.');
    }

    public function reject($invitationId)
    {
        $invitation = TeamInvitation::findOrFail($invitationId);
        logger("o user akironei to inv");

        if ($invitation->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'Δεν μπορείς να απορρίψεις αυτήν την πρόσκληση.');
        }

        $invitation->status = 'rejected';
        $invitation->save();

        return redirect()->route('dashboard')->with('success', 'Η πρόσκληση απορρίφθηκε.');
    }

    public function selectMentor(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
        ]);

        $user = auth()->user();
        $team = $user->team;

        if (!$team) {
            logger("den exei omada");
            return back()->with('error', 'Δεν έχετε ομάδα.');
        }

        if ($team->mentor_id && $team->mentor_status === 'approved') {
            return back()->with('error', 'Έχετε ήδη επιλέξει μέντορα.');
        }

        $team->mentor_id = $request->mentor_id;
        $team->mentor_status = 'pending';
        $team->save();

        return back()->with('success', 'Η επιλογή σας καταχωρήθηκε! Περιμένετε έγκριση από τον μέντορα.');
    }
}
