<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $meta['title'] ?? 'Providers' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" async rel="stylesheet">
    @vite(['resources/css/list.css'])
    @stack('head')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary" id="navigation">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Optimisation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="navigation toggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('providers.list.v1') ? 'active' : '' }}"
                       href="{{ route('providers.list.v1') }}">not optimized</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('providers.list.v2') ? 'active' : '' }}"
                       href="{{ route('providers.list.v2') }}">optimisation v1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('providers.list.v3') ? 'active' : '' }}"
                       href="{{ route('providers.list.v3') }}">optimisation v2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('providers.list.v4') ? 'active' : '' }}"
                       href="{{ route('providers.list.v4') }}">optimisation v3</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    @yield('content')
</div>

<footer class="bg-light text-center py-3 mt-4">
    <div class="container">
        <span class="text-muted">© {{ date('Y') }} Your Company</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
