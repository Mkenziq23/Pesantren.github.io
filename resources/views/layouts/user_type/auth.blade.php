@extends('layouts.app')

@section('auth')
    @if (\Request::is('profile'))
        @include('layouts.navbars.auth.sidebar')
        <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
            @include('layouts.navbars.auth.nav')
            @yield('content')
        </div>
    @else
        @include('layouts.navbars.auth.sidebar')
        <main
            class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg {{ Request::is('rtl') ? 'overflow-hidden' : '' }}">
            @include('layouts.navbars.auth.nav')
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </main>
    @endif
@endsection
