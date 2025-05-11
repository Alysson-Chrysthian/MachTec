<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/company')
    ->name('company.')
    ->group(function () {

        Route::get('/auth/register', App\Livewire\Company\Auth\Register::class)
            ->name('auth.register');
        Route::get('/auth/login', App\Livewire\Company\Auth\Login::class)
            ->name('auth.login');

        Route::middleware(['auth:company', 'verified'])
            ->group(function () {

            Route::get('/home', App\Livewire\Company\Home::class)
                ->name('home');

        });

    });

Route::prefix('/verification')
    ->name('verification.')
    ->group(function () {

        Route::get('/verify/{id}/{hash}', [App\Http\Controllers\AuthController::class, 'verify'])
            ->middleware(['auth:company', 'signed'])
            ->name('verify');
        
    });


Route::prefix('/employee')
    ->name('employee.')
    ->group(function () {

        Route::get('/auth/login', App\Livewire\Employee\Auth\Login::class)
            ->name('auth.login');

        Route::middleware('auth:employee')
            ->group(function () {

            Route::get('/home', App\Livewire\Employee\Home::class)
                ->name('home');
        
        });
    
    });

Route::get('/login', function () {
    return redirect()->route('company.auth.login');
})->name('login');
