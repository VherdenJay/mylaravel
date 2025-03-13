<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\SignInController;

//user Sign in and Log In
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('login');
});
Route::get ('/', function () {
    return view('index');
});




//admin route
Route::get ('/admin', function () {
    return view('admin');
});
Route::get ('/adLogin', function () {
    return view('adLogin');
});
Route::get ('/adRegister', function () {
    return view('adRegister');
});






//user
Route::post ('/signup', [SignInController::class, 'signup']);
Route::post ('/login', [SignInController::class, 'login']); 
Route::post ('/logout', [SignInController::class, 'logout']);

//Admin
Route::post ('/adRegister', [adminController::class, 'adRegister']);
Route::post ('/adLogin', [adminController::class, 'adLogin']);
