<?php

use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function (): void {
    require 'inc/auth.php';
});
