<?php

namespace App\Contracts;

interface ServiceProviderInt
{
    public function getServiceProviders(\Illuminate\Http\Request $request);
    public function getServiceProviderDetails(\Illuminate\Http\Request $request,  int $provider_id);
}
