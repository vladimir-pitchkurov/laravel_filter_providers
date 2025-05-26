<?php

namespace App\Contracts;

interface ServiceProviderInt
{
    public function getServiceProviders(\Illuminate\Http\Request $request);
    public function getServiceProvidersV2(\Illuminate\Http\Request $request);
    public function getServiceProviderDetails(\Illuminate\Http\Request $request,  int $provider_id);
    public function getServiceProvidersV3(\Illuminate\Http\Request $request);
    public function providersListApi(\Illuminate\Http\Request $request);
}
