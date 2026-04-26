<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function (): void {
    Route::post('login', function () {
        return 'demo';
    })->name('login');
});
