@extends('layout.main')


@section('content')
    <h1 class="mb-4">Providers List</h1>
    <div class="row">
        <div class="col-md-3">
            @if(!empty($selected_categories))
                <a href="{{ route('providers.list.v2') }}" class="btn btn-secondary w-100 mt-2">Reset Filters</a>
            @endif
            <form method="GET" action="{{ route('providers.list.v1') }}" id="category_filter">
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>Filters</strong>
                    </div>
                    <div class="card-body">
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input category-checkbox" type="checkbox"
                                       value="{{ $category->id }}"
                                       id="category_{{ $category->id }}"
                                    {{ in_array($category->id, $selected_categories) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category_{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-9">
            <div class="row row-cols-1 g-4">
                @foreach($providers as $index => $provider)
                    @cache('provider:'.$provider->id, 36000)
                        <div class="col">
                        <a href="{{ route('providers.details', ['provider' => $provider->id]) }}"
                           class="text-decoration-none text-dark">
                            <div class="card provider-card h-100 shadow-sm d-flex flex-row-reverse align-items-center">
                                <div class="col-md-4" style="padding: 1em">
                                    @if($provider->logo_url)
                                        <img src="{{ $provider->logo_url }}" class="img-fluid rounded-end"
                                             alt="{{ $provider->name }}"
                                             @if($index >= 30) loading="lazy" @endif
                                             style="width: 100%;height: 100%;object-fit: cover;border-radius: 6px;">
                                    @else
                                        <img src="https://placehold.co/600x400" class="img-fluid rounded-end"
                                             alt="No Image"
                                             @if($index >= 30) loading="lazy" @endif
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
                    @endcache
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/providers.js'])
@endpush
