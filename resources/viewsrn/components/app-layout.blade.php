<!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Developer custom styles/scripts -->
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}">
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- Date formater --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/641b531931ebfa0fe7f41d6e/1gs5bp76i';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</head>

<body>
    <div id="app">
        <div id="loader"></div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/assets/img/logo.png') }}" alt="logo" width="40px" height="auto">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth('web')
                        <ul class="navbar-nav me-auto">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('subs')" :active="request()->routeIs('subs')">
                                {{ __('Memberships') }}
                            </x-nav-link>
                            <x-nav-link :href="route('match.index')" :active="request()->routeIs('match.index')">
                                {{ __('Matches') }}
                            </x-nav-link>
                            <x-nav-link :href="route('referrals')" :active="request()->routeIs('referrals')">
                                {{ __('Refer') }}
                            </x-nav-link>
                        </ul>
                    @endauth
                    @auth('admin')
                        <ul class="navbar-nav me-auto">
                            <li class="px-3 py-1">
                                <a class="text-decoration-none text-dark fw-bold px-2 border border-2 rounded"
                                    href="{{ route('admin.dashboard') }}">Administrator Dashboard</a>
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                    {{ __('Login') }}
                                </x-nav-link>
                            @endif

                            @if (Route::has('register'))
                                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                    {{ __('Register') }}
                                </x-nav-link>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                    {{ Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                                    @auth('web')
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    @endauth
                                    @auth('admin')
                                        <a class="dropdown-item" href=""
                                            onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    @endauth


                                    @auth('web')
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endauth
                                    @auth('admin')
                                        <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @endauth
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            {{ $slot }}
            <x-flash-message></x-flash-message>
            <x-danger-message></x-danger-message>
        </main>

        {{-- footer --}}
        @include('partials._footer')
    </div>
</body>

</html>
