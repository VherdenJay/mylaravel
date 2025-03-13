<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignInController extends Controller 
{
    //for log out
    public function logout () {
        auth()->logout();
        return redirect('/login');
    }


    //for log in
    public function login(Request $request) {
        $incommingFields = $request->validate([
            'logemail' => 'required',
            'logpassword' => 'required'
        ]);
        if(auth()->attempt(['email' => $incommingFields['logemail'], 'password' => $incommingFields['logpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
            
        }
        return redirect('/login');
    }

    
    //for sign up
    public function signup (Request $request) {
        $incommingFields = $request->validate([
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nameEx' => 'required',
            'bDay' => 'required'
        ]);    
        
        $user = User::create($incommingFields);
        auth()->login($user);
        return redirect('/login');
    }
}