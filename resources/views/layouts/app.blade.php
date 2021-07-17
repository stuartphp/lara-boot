<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
    @livewireStyles
</head>
<body>
<div id="app">
    @auth
        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ __('global.logout') }}</a>
    @endauth
    <main class="container-fluid">
        @yield('content')
    </main>
</div>
<form id="logoutform" action="{{ url('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@livewireScripts
@stack('script')
<script>
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });
    window.addEventListener('modal', event => {
        $('#' + event.detail.modal).modal(event.detail.action);
    });
</script>
</body>
</html>

