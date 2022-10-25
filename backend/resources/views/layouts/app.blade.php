<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Circuit Junction</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="flex items-start justify-between">
                <a class="text-3xl font-bold pl-6 xl:pl-2 xl:my-auto hover:text-black" style="font-size:1.875rem;line-height:2.25rem;margin-top: auto;margin-bottom: auto" href="{{ url('/') }}">
                    {{--aタグ class="navbar-brand"  --}}
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Circuit Junction
                </a>
               

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <header-auth></header-auth>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="text-lg text-center  mx-4 xl:mx-1 border-b-2 border-black xl:border-white xl:py-1 hover:text-blue-500 block" href="{{ route('login') }}">ログイン</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="text-lg text-center mx-4 xl:mx-1 border-b-2 border-black xl:border-white xl:py-1 hover:text-blue-500 block" href="{{ route('register') }}">アカウント登録</a>
                                </li>
                            @endif
                        @else
                        {{-- class="nav-link dropdown-toggle"  --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="text-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <p class="text-center text-lg xl:mr-5 z-0 text-black"> <span class="text-xs">▼</span> 
                                    {{ Auth::user()->name }}
                                    </p>
                                </a>

                                 <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                 </div>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <main class="" >
            @yield('content')
        </main>
        <footer-auth></footer-auth>
    </div>
</body>
</html>

