<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(\route('providers.list.v1'));
});

Route::get('/providers',[\App\Http\Controllers\ServiceProviderController::class, 'providersList'])
    ->name('providers.list.v1');

Route::get('/providers/v2',[\App\Http\Controllers\ServiceProviderController::class, 'providersListV2'])
    ->name('providers.list.v2');

Route::get('/providers/v3',[\App\Http\Controllers\ServiceProviderController::class, 'providersListV3'])
    ->name('providers.list.v3');

Route::get('/providers/{provider}',[\App\Http\Controllers\ServiceProviderController::class, 'providerDetails'])
    ->name('providers.details');
