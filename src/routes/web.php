<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/company')
    ->name('company.')
    ->group(function () {

        Route::get('/auth/register', App\Livewire\Company\Auth\Register::class)
            ->name('auth.register');
        Route::get('/auth/login', App\Livewire\Company\Auth\Login::class)
            ->name('auth.login');

        Route::get('/logout', function () {
            Auth::guard('company')->logout();
            return redirect()->route('company.auth.login');
        })->name('logout');

        Route::middleware(['auth:company', 'verified', App\Http\Middleware\Subscribed::class])
            ->group(function () {

            Route::get('/home', App\Livewire\Company\Home::class)
                ->name('home');

            Route::get('/machines', App\Livewire\Company\Machine\Index::class)
                ->name('machine');

        });

    });

Route::get('/billing', App\Livewire\Company\Billing::class)
    ->middleware(['auth:company', 'verified'])
    ->name('billing');

Route::get('/checkout/{name}', [App\Http\Controllers\PlanController::class, 'checkout'])
    ->middleware(['auth:company', 'verified'])
    ->name('checkout');

Route::prefix('/verification')
    ->name('verification.')
    ->group(function () {

        Route::get('/verify/{id}/{hash}', [App\Http\Controllers\AuthController::class, 'verify'])
            ->middleware(['auth:company', 'signed'])
            ->name('verify');
        Route::get('/notice', App\Livewire\Company\Auth\VerificationNotice::class)
            ->middleware(['auth:company'])
            ->name('notice');

    });


Route::prefix('/employee')
    ->name('employee.')
    ->group(function () {

        Route::get('/auth/login', App\Livewire\Employee\Auth\Login::class)
            ->name('auth.login');
        
        Route::get('/logout', function () {
            Auth::guard('employee')->logout();
            return redirect()->route('employee.auth.login');
        })->name('logout');


        Route::middleware('auth:employee')
            ->group(function () {

            Route::get('/home', App\Livewire\Employee\Home::class)
                ->name('home');
        
        });
    
    });

Route::get('/login', function () {
    return redirect()->route('company.auth.login');
})->name('login');

Route::get('/', function () {
    return redirect()->route('company.home');
});
