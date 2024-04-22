<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\TransportController;



Route::middleware('auth')->group(function () {
    Route::get('user', [UserController::class, 'create'])->name('user.index');

    Route::middleware('admin')->prefix('admin')->group(function (){
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::controller(CityController::class)->prefix('cities')->group(function (){
            Route::get('create', 'create')->name('admin.city.create');
            Route::post('create', 'store');
            Route::get('{city}/edit', 'edit')->name('admin.city.edit');
            Route::patch('{city}', 'update')->name('admin.city.update');
            Route::delete('{city}/delete', 'delete')->name('admin.city.delete');
        });
        Route::controller(TransportController::class)->prefix('cities')->group(function (){
            Route::get('{city}/transports', 'index')->name('admin.transport.index');
        });
    });

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
});

