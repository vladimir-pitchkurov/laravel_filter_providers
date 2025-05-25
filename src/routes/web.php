<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/providers',[\App\Http\Controllers\ServiceProviderController::class, 'prividersList'])
    ->name('providers.list.v1');
