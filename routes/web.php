<?php

use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
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




//user
Route::post ('/signup', [SignInController::class, 'signup']);
Route::post ('/login', [SignInController::class, 'login']); 
Route::post ('/logout', [SignInController::class, 'logout']);



//Admin
Route::post ('/out', [SignInController::class, 'out']);



//admin route  // dd(auth()->user()->admin);
Route::get('/admin', function () {
    $user = auth()->user();
    $showUser = User::all();
    $products = \App\Models\Products::all();
    return view('admin', ['user' => $user, 'products' => $products, 'showUser' => $showUser]);
})->middleware(AdminMiddleware::class);



//Products Routes
Route::post ('/store', [ProductsController::class, 'store']);
Route::get ('/', [ProductsController::class, 'index']);
Route::delete ('/destroy/{products}', [ProductsController::class, 'destroy']);