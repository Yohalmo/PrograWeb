@extends('templates.html_page')
@section('Data')

    @include('templates.navbar')

<div id="layoutSidenav">
    @can('ver-sidebar')
        @include('templates.sidebar')
    @endcan
    <div id="layoutSidenav_content" class="{{ $noNavbar ?? '' }}">
        <main>
            <div id="bodyContent" class="{{ $classContent ?? 'p-3' }}">
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
