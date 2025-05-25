<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/providers',[\App\Http\Controllers\ServiceProviderController::class, 'providersList'])
    ->name('providers.list.v1');

Route::get('/providers/{provider}',[\App\Http\Controllers\ServiceProviderController::class, 'providerDetails'])
    ->name('providers.list.v1');
