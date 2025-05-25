<?php

namespace App\Services;

use App\Contracts\ServiceProviderInt;
use App\Models\Category;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ProvidersService implements ServiceProviderInt
{

    public function getServiceProviders(Request $request)
    {
        $query = ServiceProvider::query();
        $query->with(['categories']);
        $query->orderBy('name');

        $selected_categories = $request->query('categories', '');
        if ($selected_categories) {
            $selected_categories = explode(',', $selected_categories);
        } else {
            $selected_categories = [];
        }

        if (!empty($selected_categories)) {
            $query->whereHas('categories', function ($q) use ($selected_categories) {
                $q->whereIn('categories.id', $selected_categories);
            });
        }

        $providers = $query->get();

        $all_categories = Category::get(['name', 'id']);

        return view('providers.list', [
            'providers' => $providers,
            'categories' => $all_categories,
            'selected_categories' => $selected_categories,
        ]);
    }

    public function getServiceProviderDetails(Request $request, int $provider_id)
    {
        $provider = ServiceProvider::with(['categories'])->findOrFail($provider_id);

        return view('providers.details', [
            'provider' => $provider,
        ]);
    }

}
