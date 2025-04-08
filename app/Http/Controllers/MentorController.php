<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::with('team.members')->get();


        return view('mentors.index', compact('mentors'));
    }

    public function showRegisterForm()
    {
        return view('mentors.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:mentors,email',
            'bio' => 'required|string|max:1000',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Mentor::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'bio' => $request->bio,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Η εγγραφή ολοκληρώθηκε! Μπορείς τώρα να συνδεθείς.');
    }

    public function showLoginForm()
    {
        return view('mentors.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::guard('mentor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('mentors.dashboard')->with('success', 'Σύνδεση επιτυχής!');
        }

        return back()->withErrors(['email' => 'Λάθος στοιχεία σύνδεσης'])->withInput();
    }

    public function logout()
    {
        Auth::guard('mentor')->logout();
        return redirect()->route('mentors.login')->with('success', 'Αποσυνδέθηκες επιτυχώς!');
    }

    public function dashboard()
    {
        $mentor = auth()->user();
    
        $teamRequests = Team::where('mentor_id', $mentor->id)
        ->where('mentor_status', 'pending')
        ->get();
    
        $acceptedTeam = Team::where('mentor_id', $mentor->id)
        ->where('mentor_status', 'approved')
        ->first();
    
        return view('mentors.dashboard', compact('mentor', 'teamRequests', 'acceptedTeam'));
    }

    public function accept($teamId)
    {
        $team = Team::findOrFail($teamId);
        
        $team->mentor_status = 'approved';
        $team->mentor_id = auth()->user()->id;  
        $team->save();

        $mentor = auth()->user();
        $mentor->team_id = $team->id;
        $mentor->save();

        return redirect()->route('mentors.dashboard')->with('success', 'Η ομάδα αποδέχθηκε επιτυχώς!');
    }


    public function decline($teamId)
    {
        $team = Team::findOrFail($teamId);
        $team->mentor_status = 'rejected';
        $team->save();

        return redirect()->route('mentors.dashboard')->with('error', 'Η αίτηση απορρίφθηκε επιτυχώς!');
    }
    
}
