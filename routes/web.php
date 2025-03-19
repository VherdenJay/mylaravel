<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\ProductsController;

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

//user
Route::post ('/signup', [SignInController::class, 'signup']);
Route::post ('/login', [SignInController::class, 'login']); 
Route::post ('/logout', [SignInController::class, 'logout']);

//Admin
Route::post ('/out', [SignInController::class, 'out']);

//admin route
Route::get ('/admin', function () {
    // dd(auth()->user()->admin);
    $user = auth()->user();
    $products = Products::all();
    return view('admin', ['user' => $user, 'products' => $products]);
});

//Products Routes
Route::post ('/store', [ProductsController::class, 'store']);