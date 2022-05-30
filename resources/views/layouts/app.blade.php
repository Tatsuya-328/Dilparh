<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>
    <script src="{{ asset('js/uru_top.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style_uru.css') }}" rel="stylesheet">

</head>

<body alink=”#0056b3>
    <!-- <div id="app"> -->
    <header class="pc_page-header wrapper">
        @guest
        <div class="account_name" id="navbarSupportedContent">

            <!-- <li class="nav-item"> -->
            <a class="nav-link right_btn" href="{{ route('login') }}">{{ __('Login') }}</a>
            <!-- </li> -->
            @if (Route::has('register'))
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

                <!-- <li class="nav-item"> -->
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                <!-- </li> -->
                @endif

                @else
                <span class="nav_toggle">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
                <nav class="nav">
                    <ul class="nav_menu_ul">
                        <li class="nav_menu_li"><a href="{{ route('index') }}">HOME</a></li>
                        <li class="nav_menu_li"><a href="{{ route('how') }}">使い方を学ぶ</a></li>
                        <li class="nav_menu_li"><a href="{{ route('select_part') }}">問題をはじめる</a></li>
                        <li class="nav_menu_li"><a href="dictionary/japanese">単語検索</a></li>
                        <li class="nav_menu_li"><a href="{{ route('about') }}">このサイトについて</a></li>
                        <li class="nav_menu_li"><a href="{{ route('config') }}">設定</a></li>
                    </ul>
                </nav>
                <div class="account_name" id="navbarSupportedContent">


                    <!-- <li class="nav-item dropdown"> -->
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} のアカウント<span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <!-- </li> -->
                    @endguest
                    <!-- </ul> -->
                </div>
                <!-- </div> -->
    </header>

    <main class="py-4">
        @yield('content')
    </main>
    <!-- </div> -->
</body>
<script type="module">
    // login registerボタンを右上に配置
    jQuery.noConflict();
    jQuery(function(){
	 jQuery("div:has(.right_btn)").addClass(".right_btn");
	 jQuery(".pc_page-header:has(.right_btn)").css('justify-content','right');
});
</script>
</html>