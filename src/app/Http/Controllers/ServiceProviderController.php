<?php

namespace App\Http\Controllers;

use App\Contracts\ServiceProviderInt;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    private readonly ServiceProviderInt $service;

    public function __construct(ServiceProviderInt $service)
    {
        $this->service = $service;
    }

    public function prividersList(Request $request)
    {
        return $this->service->getServiceProviders($request);
    }
}
