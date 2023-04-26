@extends('templates.html_page')
@section('Data')

    @include('templates.navbar')

<div id="layoutSidenav">
    @include('templates.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div id="bodyContent">
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
