<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="h-100  bg-white">
    <div id="app" class="h-100">
        @include('examples.layouts.sidebar')
        {{-- <nav class="navbar my navbar-expand navbar-light bg-white shadow-sm ps-4 pe-4" style="height: 66px">
            <div class="d-lg-none">
                @include('examples.layouts.burger')
            </div>
            <a class="d-none d-lg-block" href="{{ url('/') }}">
                <img src="{{ asset('image/wilogo1.gif') }}" alt="" style="max-height: 50px">
            </a>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->

                    @include('examples.layouts.profile_dropdown')
                </ul>
            </div>
        </nav> --}}
        <div class="d-flex min-vh-100">
            <div class="d-flex flex-column flex-shrink-0 p-3 border-end" style="width: 340px;">
                <a class="" href="{{ url('/') }}">
                    <img src="{{ asset('image/wilogo1.gif') }}" alt="" style="max-width: 307px">
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ url('/products?type=Table') }}"
                            class="nav-link d-flex align-items-center justify-content-start @if (Route::currentRouteName() === 'product.index') active @endif"
                            aria-current="page">
                            @if (Route::currentRouteName() === 'product.index')
                                <img src="{{ asset('image/product-light.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @else
                                <img src="{{ asset('image/product-dark.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @endif
                            <span
                                class="fs-5 ms-2 text-blue @if (Route::currentRouteName() === 'product.index') text-light @endif">Оборудование</span>
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a href="{{ route('partner.index') }}"
                            class="nav-link d-flex align-items-center justify-content-start @if (Route::currentRouteName() === 'partner.index') active @endif"
                            aria-current="page">
                            @if (Route::currentRouteName() === 'partner.index')
                                <img src="{{ asset('image/partner-light.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @else
                                <img src="{{ asset('image/partner-dark.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @endif
                            <span
                                class="fs-5 ms-2 text-blue @if (Route::currentRouteName() === 'partner.index') text-light @endif">Контрагенты</span>
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a href="{{ route('transaction.createComing') }}"
                            class="nav-link d-flex align-items-center justify-content-start @if (Route::currentRouteName() === 'transaction.createComing' ||
                                    Route::currentRouteName() === 'transaction.createExpense') active @endif"
                            aria-current="page">
                            @if (Route::currentRouteName() === 'transaction.createComing' ||
                                    Route::currentRouteName() === 'transaction.createExpense')
                                <img src="{{ asset('image/transaction-light.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @else
                                <img src="{{ asset('image/transaction-dark.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @endif
                            <span
                                class="fs-5 ms-2 text-blue @if (Route::currentRouteName() === 'transaction.createComing' ||
                                        Route::currentRouteName() === 'transaction.createExpense') text-light @endif">Транзакция</span>
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a href="{{ route('history.index') }}"
                            class="nav-link d-flex align-items-center justify-content-start @if (Route::currentRouteName() === 'history.index') active @endif"
                            aria-current="page">
                            @if (Route::currentRouteName() === 'history.index')
                                <img src="{{ asset('image/history-light.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @else
                                <img src="{{ asset('image/history-dark.png') }}" alt=""
                                    style="width: 24px; height: 24px">
                            @endif
                            <span
                                class="fs-5 ms-2 text-blue @if (Route::currentRouteName() === 'history.index') text-light @endif">История</span>
                        </a>
                    </li>

                    @can('isAdmin', auth()->user())
                        <hr>

                        <li class="nav-item mt-2">
                            <a href="{{ route('personal.index') }}"
                                class="nav-link d-flex align-items-center justify-content-start @if (Route::currentRouteName() === 'personal.index') active @endif"
                                aria-current="page">
                                @if (Route::currentRouteName() === 'personal.index')
                                    <img src="{{ asset('image/personal-light.png') }}" alt=""
                                        style="width: 24px; height: 24px">
                                @else
                                    <img src="{{ asset('image/personal-dark.png') }}" alt=""
                                        style="width: 24px; height: 24px">
                                @endif
                                <span
                                    class="fs-5 ms-2 text-blue @if (Route::currentRouteName() === 'personal.index') text-light @endif">Сотрудники</span>
                            </a>
                        </li>
                    @endcan
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                            class="rounded-circle me-2"> --}}
                        <strong class="fs-5">{{ auth()->user()->name . ' ' . auth()->user()->surname }}</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        {{-- <li><a class="dropdown-item fs-5" href="#">Профиль</a></li> --}}
                        {{-- <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li> --}}
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li>
                            <a class="dropdown-item fs-5" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Выход</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
            <main class="p-4 w-100">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
