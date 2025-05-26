<?php

use Illuminate\Support\Facades\Route;

Route::get('/providers',[\App\Http\Controllers\ServiceProviderController::class, 'providersListApi']);
