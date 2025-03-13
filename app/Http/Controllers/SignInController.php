<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class SignInController extends Controller 
{
    // Logout function
    public function logout() {
        auth()->logout();
        return redirect('/login');
    }

    // Login function
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'logemail' => 'required|email',
            'logpassword' => 'required'
        ]);

        // Check if email exists
        $user = User::where('email', $incomingFields['logemail'])->first();
        if (!$user) {
            return back()->withErrors(['logemail' => 'Unknown Email']);
        }

        // Attempt login
        if (auth()->attempt(['email' => $incomingFields['logemail'], 'password' => $incomingFields['logpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['logpassword' => 'Incorrect credentials']);
    }

    // Signup function
    public function signup(Request $request) {
        $incomingFields = $request->validate([
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',          
                'regex:/[0-9]/',  
                'regex:/[A-Z]/',  
            ],
            'nameEx' => 'required|string',
            'bDay' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(15)->format('Y-m-d')
            ],
        ], [
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter and one number.',
            'bDay.before_or_equal' => 'You must be at least 15 years old to register.',
        ]);

        // Hash the password before storing
        // $incomingFields['password'] = Hash::make($incomingFields['password']);

        // Create user
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/login')->with('success', 'Registered successfully');
    }
}