<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\IndexController;


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', IndexController::class)->name('user.index');
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function (){
        Route::get('login', 'create')->name('login');
        Route::post('login', 'store');
    });

    Route::controller(RegisterController::class)->group(function (){
        Route::get('register', 'create')->name('register');
        Route::post('register', 'store');
    });
    // Route::any('/{any}', function (){
    //     return redirect()->route('auth.login');
    // });
});

