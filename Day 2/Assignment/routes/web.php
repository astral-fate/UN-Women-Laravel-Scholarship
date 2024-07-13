<?php

use Illuminate\Support\Facades\Route;

// Accounts Routes
Route::prefix('accounts')->group(function () {
    Route::get('/', function () {
        return 'Accounts Homepage';
    })->name('accounts.home');

    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return 'Admin Dashboard';
        })->name('accounts.admin');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', function () {
            return 'User Dashboard';
        })->name('accounts.user');
    });
});


// Car Routes
Route::prefix('cars')->group(function () {
    Route::get('/', function () {
        return 'Cars Homepage';
    })->name('cars.home');

    Route::prefix('usa')->group(function () {
        Route::get('/ford', function () {
            return 'Ford Cars in USA';
        })->name('cars.usa.ford');

        Route::get('/tesla', function () {
            return 'Tesla Cars in USA';
        })->name('cars.usa.tesla');
    });

    Route::prefix('ger')->group(function () {
        Route::get('/mercedes', function () {
            return 'Mercedes Cars in Germany';
        })->name('cars.ger.mercedes');

        Route::get('/audi', function () {
            return 'Audi Cars in Germany';
        })->name('cars.ger.audi');

        Route::get('/volkswagen', function () {
            return 'Volkswagen Cars in Germany';
        })->name('cars.ger.volkswagen');
    });
});
