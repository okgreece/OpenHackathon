<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); // Επιστροφή στη φόρμα σύνδεσης
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Αναζητούμε τον admin με το email
        $admin = AdminUser::where('email', $request->email)->first();

        if (!$admin) {
            return back()->with('error', 'Λάθος email ή κωδικός.');
        }

        // Έλεγχος του κωδικού
        if (password_verify($request->password, $admin->password)) {
            Auth::login($admin); // Αυτό τώρα λειτουργεί με το μοντέλο AdminUser

            // Ανακατεύθυνση στο admin panel
            return redirect()->route('admin.panel');
        } else {
            return back()->with('error', 'Λάθος email ή κωδικός.');
        }
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
