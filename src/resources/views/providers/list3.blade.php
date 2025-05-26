@extends('layout.main')

@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
    <script>
        window.app_categories = @json($categories);
        window.app_selected_categories = @json($selected_categories);
    </script>
    @vite('resources/js/list.js')
@endpush
