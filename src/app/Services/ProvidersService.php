<?php

namespace App\Services;

use App\Contracts\ServiceProviderInt;
use App\Models\Category;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ProvidersService implements ServiceProviderInt
{
    // Implement methods defined in ServiceProviderInt interface here
    // For example:

    public function getServiceProviders(Request $request)
    {
        $query = ServiceProvider::query();
        $query->with(['categories']);
        $query->orderBy('name');

        // get selected categories from request query parameters
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

//        dd($providers->filter(function ($provider) use ($selected_categories) {
//            if (empty($selected_categories)) {
//                return true; // If no categories are selected, include all providers
//            }
//            // Check if the provider has any of the selected categories
//            return !$provider->categories->pluck('id')->intersect($selected_categories)->isNotEmpty();
//        }));

        $all_categories = Category::get(['name', 'id']);

        return view('providers.list', [
            'providers' => $providers,
            'categories' => $all_categories,
            'selected_categories' => $selected_categories,
        ]);
    }

    public function getServiceProviderById($id)
    {
        // Logic to retrieve a specific service provider by ID
    }

    public function createServiceProvider(array $data)
    {
        // Logic to create a new service provider
    }

    public function updateServiceProvider($id, array $data)
    {
        // Logic to update an existing service provider
    }

    public function deleteServiceProvider($id)
    {
        // Logic to delete a service provider
    }

}
