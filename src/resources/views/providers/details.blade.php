@extends('layout.main')

@section('content')
    <div class="container py-4">
        <div class="row align-items-center mb-4">
            <div class="col-md-4">
                @if($provider->logo_url)
                    <img src="{{ $provider->logo_url }}" class="img-fluid rounded shadow-sm"
                         alt="{{ $provider->name }}">
                @else
                    <img src="https://placehold.co/600x400?text=No+Image" class="img-fluid rounded shadow-sm"
                         alt="No Image">
                @endif
            </div>
            <div class="col-md-8">
                <h1 class="mb-3">{{ $provider->name }}</h1>
                @if($provider->categories->isNotEmpty())
                    <p>
                        <strong>Categories:</strong>
                        {{ $provider->categories->pluck('name')->join(', ') }}
                    </p>
                @endif
                @if($provider->website_url)
                    <p>
                        <a href="{{ $provider->website_url }}" target="_blank" class="btn btn-outline-primary">
                            Open site
                        </a>
                    </p>
                @endif
            </div>
        </div>

        @if($provider->description)
            <div class="mb-4">
                <h4>Description</h4>
                <p>{{ $provider->description }}</p>
            </div>
        @endif

        @if(url()->previous() && url()->previous() !== url()->current())
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                ← Back
            </a>
        @else
            <a href="{{ route('providers.list.v1') }}" class="btn btn-secondary">
                ← Back
            </a>
        @endif
    </div>
@endsection
