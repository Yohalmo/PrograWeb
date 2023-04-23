@extends('templates.html_page')
@section('Data')

@if (isset($narbar))
    @include('templates.navbar')
@endif

<div id="layoutSidenav">
    @include('templates.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div id="bodyContent" class="p-3">
                @yield('body')
            </div>
        </main>

        @include('templates.footer')
    </div>
</div>

@endsection

@section('scripts')
@yield('scripts')
@endsection
