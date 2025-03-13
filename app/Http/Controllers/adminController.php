<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminController extends Controller
{

    
    
    // //for log out
    // public function logout () {
    //     auth()->logout();
    //     return redirect('/login');
    // }
    
    //for log in
    public function adLogin(Request $request) {
        $incommingAdminFields = $request->validate([
            'adminLoginEmail' => 'required',
            'adminPassword' => 'required'
        ]);
        if(auth()->attempt(['email' => $incommingAdminFields['adminLoginEmail'], 'password' => $incommingAdminFields['adminPassword']])) {
            $request->session()->regenerate();
            return redirect('/admin');
            
        }
        return redirect('/adLogin');
    }

    // For admin registration
    public function adRegister (Request $request) {
        $incommingAdminFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);  
        
        // $incommingAdminFields['password'] = bcrypt($incommingAdminFields['adminPassword']);

        $user = admin::create($incommingAdminFields);
        auth()->login($user);
        return redirect('/adLogin');
    }
}
