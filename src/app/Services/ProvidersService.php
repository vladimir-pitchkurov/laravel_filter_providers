<?php

namespace App\Services;

use App\Contracts\ServiceProviderInt;
use App\Models\Category;
use App\Models\ServiceProvider;
use App\Models\ServiceProviderCategory;
use Illuminate\Http\JsonResponse;
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

    public function getServiceProvidersV2(Request $request)
    {
        $all_categories = $this->getAllCategories();
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

        return view('providers.list2', [
            'providers' => $providers,
            'categories' => $all_categories,
            'selected_categories' => $selected_categories,
        ]);
    }

    public function providersListApi(Request $request): JsonResponse
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

        return response()->json([
            'providers' => $providers,
        ]);
    }

    public function getServiceProvidersV3(Request $request)
    {
        $all_categories = $this->getAllCategories();

        $selected_categories = $request->query('categories', '');
        if ($selected_categories) {
            $selected_categories = explode(',', $selected_categories);
        } else {
            $selected_categories = [];
        }

        return view('providers.list3', [
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

    public function getAllCategoriesRelations()
    {
        $cache_key = 'all_categories_relations';
        $exists = cache()->has($cache_key);
        if ($exists) {
            return cache()->get($cache_key);
        }
        return cache()->remember($cache_key, 60 * 60 * 24, function () {
            return ServiceProviderCategory::get(['service_provider_id', 'category_id']);
        });
    }

    public function getAllCategories()
    {
        $cache_key = 'all_categories';
        $exists = cache()->has($cache_key);
        if ($exists) {
            return cache()->get($cache_key);
        }
        return cache()->remember($cache_key, 60 * 60 * 24, function () {
            return Category::get(['name', 'id']);
        });
    }
}
