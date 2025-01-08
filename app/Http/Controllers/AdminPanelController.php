<?php

namespace App\Http\Controllers;

use App\Models\HackathonPhase;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $users = User::all();

        $members = TeamMember::with('user', 'team')->get();
        $teamRequests = TeamRequest::where('status', 'pending')->with('user')->get();
        $phases = HackathonPhase::all();

        return view('admin.panel', compact('teams', 'teamRequests', 'members','phases','users'));
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);

        $team->members()->delete();

        $team->delete();

        return back()->with('success', 'Η ομάδα διαγράφηκε επιτυχώς.');
    }

    public function deleteMember($id)
    {
        $member = TeamMember::findOrFail($id);
        $user = User::where('id', $member->user_id)->first();

        if ($user) {
           
            $user->team_id = null;
            $user->save();

        } else {
            dd('No user found for team member:', ['member_id' => $id]);
        }

        $member->delete();

        return back()->with('success', 'Το μέλος διαγράφηκε επιτυχώς.');
    }

    public function viewTeamRequests()
    {
        $teamRequests = TeamRequest::with('user')->where('status', 'pending')->get();
        return view('admin.team-requests', compact('teamRequests'));
    }

    public function approveRequest($id)
    {
        $teamRequest = TeamRequest::findOrFail($id);

        $team = Team::create([
            'user_id' => $teamRequest->user_id,
            'name' => $teamRequest->team_name,
            'description' => $teamRequest->description,
            'environmental_data' => $teamRequest->environmental_data,
        ]);

        TeamMember::create([
            'team_id' => $team->id,
            'user_id' => $teamRequest->user_id,
            'role' => 'leader',
            'joined_at' => now(),
        ]);

        $user = $teamRequest->user;
        $user->team_id = $team->id;
        $user->save();
        $teams = Team::all();

        $teamRequest->delete();

        return redirect()->back();
    }

    //hackathon phases update
    public function updateEndDate(Request $request, $id)
    {
        $request->validate([
            'end_date' => 'required|date',
        ]);

        $phase = HackathonPhase::findOrFail($id);

        $phase->end_date = $request->input('end_date');
        
        $phase->save();

        return redirect()->back()->with('success', 'Η ημερομηνία λήξης ενημερώθηκε επιτυχώς!');
    }

    public function toggleRegistration()
    {
        $setting = \App\Models\Setting::first();
        $setting->registration_active = !$setting->registration_active;
        $setting->save();

        return back()->with('success', 'Η κατάσταση της εγγραφής ενημερώθηκε.');
    }

    public function rejectRequest($id, Request $request)
    {
        $teamRequest = TeamRequest::findOrFail($id);
        $teamRequest->status = 'rejected';
        $teamRequest->rejection_reason = $request->input('rejection_reason');  // Αποθήκευση του λόγου απόρριψης
        $teamRequest->save();

        return redirect()->back();
    }

    public function assignUserToTeam(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'team_id' => 'required|exists:teams,id',
        ]);

        $teamMembersCount = TeamMember::where('team_id', $request->team_id)->count();

        if ($teamMembersCount >= 4) {
            return redirect()->back()->withErrors(['team' => 'Η ομάδα έχει ήδη 4 μέλη.']);
        }

        $existingMembership = TeamMember::where('user_id', $request->user_id)->first();

        if ($existingMembership) {
            return redirect()->back()->withErrors(['user' => 'Ο χρήστης ανήκει ήδη σε μία ομάδα.']);
        }

        TeamMember::create([
            'user_id' => $request->user_id,
            'team_id' => $request->team_id,
            'role' => 'member',
        ]);

        User::where('id', $request->user_id)->update([
            'team_id' => $request->team_id,
        ]);

        return redirect()->back()->with('success', 'Ο χρήστης προστέθηκε στην ομάδα με επιτυχία.');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
