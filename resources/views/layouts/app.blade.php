<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/custom.css?{{ time() }}">
    @stack('css')
    @livewireStyles
</head>

<body>
    <div id="app">
        @auth
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand text-success" href="/home">Attela <sup><i>erp</i></sup></a>
                    @if (session()->get('company_id'))
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <x-icon-list class="w-5 h-5"/>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            {{ session()->get('trading_name') }} | {{ session()->get('financial_year') }} | {{ __('Period').':'.session()->get('financial_period') }}
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard') }}" class="nav-link {{request()->is('dashboard') ? 'active' : ''}}" data-toggle="tooltip" title="{{ __('global.dashboard') }}">
                                        <x-icon-speedometer2 class="w-6 h-6 d-none d-sm-block"/> <span class="d-block d-sm-none">{{ __('global.dashboard') }}</span>
                                    </a>
                                </li>
                                @can('inventory_access')
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Link</a>
                                    </li>
                                @endcan

                                @if(count(array_intersect(session()->get('grant'), ['SU','users_management_access']))==1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{request()->is('users/*') ? 'active' : ''}}" href="#" id="navbarScrollingDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <x-icon-person-bounding-box class="w-5 h-5 d-none d-sm-block"/>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                        <li><a class="dropdown-item" href="#">Users</a></li>
                                        <li><a class="dropdown-item" href="#">Roles</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Permissions</a></li>
                                    </ul>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Link
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
                                </li>
                            </ul>
                    @endif

                    <span class="navbar-text">
                        <div class="btn-group  dropstart">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ __('Logout') }}</a>
                                </li>
                            </ul>
                        </div>
                    </span>
                </div>
        </div>
        </nav>
    @endauth
    <main class="container-fluid">
        @yield('content')
    </main>
    </div>
    <form id="logoutform" action="{{ url('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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
