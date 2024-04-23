<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Admin\TicketController;



Route::middleware('auth')->group(function () {
    Route::middleware('user')->prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'create'])->name('user.index');
    });

    Route::middleware('admin')->group(function (){
            Route::prefix('/admin/cities')->group(function(){
                Route::controller(CityController::class)->group(function (){
                    Route::get('/', 'index')->name('admin.city.index');
                    Route::get('create', 'create')->name('admin.city.create');
                    Route::post('create', 'store');
                    Route::get('{city}/edit', 'edit')->name('admin.city.edit');
                    Route::patch('{city}', 'update')->name('admin.city.update');
                    Route::delete('{city}/delete', 'delete')->name('admin.city.delete');
                });
                Route::prefix('{city}/transports')->group(function(){
                    Route::controller(TransportController::class)->group(function (){
                        Route::get('/', 'index')->name('admin.transport.index');
                        Route::get('create', 'create')->name('admin.transport.create');
                        Route::post('create', 'store');
                        Route::get('{transport}/edit', 'edit')->name('admin.transport.edit');
                        Route::patch('{transport}', 'update')->name('admin.transport.update');
                        Route::delete('{transport}/delete', 'delete')->name('admin.transport.delete');
                     });
                });
                Route::prefix('{city}/tickets')->group(function(){
                    Route::controller(TicketController::class)->group(function (){
                        Route::get('/', 'index')->name('admin.ticket.index');
                        Route::get('create', 'create')->name('admin.ticket.create');
                        Route::post('create', 'store');
                        Route::get('{ticket}/edit', 'edit')->name('admin.ticket.edit');
                        Route::patch('{ticket}', 'update')->name('admin.ticket.update');
                        Route::delete('{ticket}/delete', 'delete')->name('admin.ticket.delete');
                     });
                });
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

