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

    public function providersList(Request $request)
    {
        return $this->service->getServiceProviders($request);
    }

    public function providerDetails(Request $request, int $provider_id)
    {
        return $this->service->getServiceProviderDetails($request, $provider_id);
    }
}
