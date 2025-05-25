@extends('layout.main')

@push('head')
    <style>
        .provider-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .provider-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
@endpush

@section('content')
    <h1 class="mb-4">Providers List</h1>
    <div class="row">
        <div class="col-md-3">
            @if(!empty($selected_categories))
                <a href="{{ route('providers.list.v1') }}" class="btn btn-secondary w-100 mt-2">Reset Filters</a>
            @endif
            <form method="GET" action="{{ route('providers.list.v1') }}" id="category_filter">
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>Фильтр по категориям</strong>
                    </div>
                    <div class="card-body">
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input category-checkbox" type="checkbox" value="{{ $category->id }}"
                                       id="category_{{ $category->id }}"
                                    {{ in_array($category->id, $selected_categories) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category_{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100">Применить</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-9">
            <div class="row row-cols-1 g-4">
                @foreach($providers as $provider)
                    <div class="col">
                        <a href="{{ $provider->website_url ?? '#' }}" class="text-decoration-none text-dark">
                            <div class="card provider-card h-100 shadow-sm d-flex flex-row-reverse align-items-center">
                                <div class="col-md-4" style="padding: 1em">
                                    @if($provider->logo_url)
                                        <img src="{{ $provider->logo_url }}" class="img-fluid rounded-end"
                                             alt="{{ $provider->name }}" style="width: 100%;height: 100%;object-fit: cover;border-radius: 6px;">
                                    @else
                                        <img src="https://placehold.co/600x400" class="img-fluid rounded-end" alt="No Image"
                                             style="width: 100%;height: 100%;object-fit: cover;border-radius: 6px;">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $provider->name }}</h5>
                                        <p class="card-text">{{ $provider->description }}</p>
                                        @if($provider->categories->isNotEmpty())
                                            <p class="card-text">
                                                <strong>Categories:</strong>
                                                {{ $provider->categories->pluck('name')->join(', ') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/providers.js'])
@endpush
