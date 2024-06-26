<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect()->route('signin');
});

Route::middleware(['web'])->group(function () {
    Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signUp'])->name('signup.submit');

    Route::get('/signin', [AuthController::class, 'showSignInForm'])->name('signin');
    Route::post('/signin', [AuthController::class, 'signIn'])->name('signin.submit');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/choose-glove', function () {
        return view('choose-glove');
    })->name('choose-glove');
    
    Route::get('/mobile-glove', function () {
        return view('mobile-glove-page');
    })->name('mobile-glove');
    
    Route::get('/lite-glove', function () {
        return view('lite-glove-page');
    })->name('lite-glove');
    
    Route::get('/ai-glove', function () {
        return view('ai-glove-page');
    })->name('ai-glove');

    Route::post('/purchase', [TransactionController::class, 'purchase'])->name('purchase');
});
