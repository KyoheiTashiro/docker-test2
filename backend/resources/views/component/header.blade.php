{{-- login.bladeとregister.bladeで@includeする --}}

{{-- ホーム画面へのリンクのみ表示するヘッダー --}}


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Circuit Junction</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    {{-- ↑ここでscript読み込むとwarn出る、app2.bladeのscriptと重複する為 --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="text-3xl font-bold hover:text-black" style="font-size:1.875rem;line-height:2.25rem;" href="{{ url('/') }}">
                    Circuit Junction
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <div>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="text-lg px-3 py-1 hover:text-blue-500 block border-b-2 border-black xl:border-white text-center" href="{{ route('login') }}">
                                    ログイン
                                       
                                    </a>
                                </li>
                            @endif
                        </div>
                        <div>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="text-lg px-3 py-1  hover:text-blue-500 block border-b-2 border-black xl:border-white text-center" href="{{ route('register') }}">
                                        アカウント登録
                                        
                                    </a>
                                </li>
                            @endif
                        </div>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <p class="text-lg text-black">
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
            </div>
        </nav>
    </div>
</body>
</html>
