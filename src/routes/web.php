<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::prefix('/company')
    ->name('company.')
    ->group(function () {

        Route::get('/auth/register', App\Livewire\Company\Auth\Register::class)
            ->name('auth.register');
        Route::get('/auth/login', App\Livewire\Company\Auth\Login::class)
            ->name('auth.login');

        Route::middleware('auth:company')
            ->group(function () {

            Route::get('/home', App\Livewire\Company\Home::class)
                ->name('home');

        });

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