<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Εμφανίζει τη φόρμα σύνδεσης.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Εκτελεί τη διαδικασία του login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt($credentials)) {

            return redirect()->intended(route('dashboard'));
        }

        // Αποτυχία σύνδεσης
        return redirect()->back()->withErrors(['email' => 'Τα στοιχεία σύνδεσης είναι λανθασμένα'])->withInput();
    }

    /**
     * Εκτελεί την έξοδο του χρήστη.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Αποσυνδέθηκες επιτυχώς!');
    }
}
