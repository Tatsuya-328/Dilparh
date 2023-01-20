<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>文法ディルパル</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>
    <script src="{{ asset('js/uru_top.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/grammar/top.css') }}" rel="stylesheet">
    @if (isset($quiz))
    <script src="{{ asset('js/grammar/grammar.js') }}" defer></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    @endif
</head>

<body alink=”#0056b3 class="grammar_body">
    <!-- <div id="app"> -->
        @guest
        <header class="pc_page-header wrapper">
            <div class="account_name" id="navbarSupportedContent">
                <a class="nav-link right_btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div> 
        </header>
        @else
<!-- ここから文法 -->
            <header class="wrapper">
                <div class="header-inner">
                    <h1 class="title">
                        <a href="/grammar/">
                            <img class="logo_name" src="\image\logo_name.png" alt="ロゴ">
                        </a>
                    </h1>
                    <nav class="nav">
                        <ul class="menu-group">
                            <li class="menu-item">
                                <a href="#">Home画面</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">testのアカウント</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- <div class="e52799_24721"></div> ボーダー-->
            </header>
<!-- ここまで -->
        @endguest
    
    <main class="py-4">
        @yield('content')
    </main>
    <!-- </div> -->
</body>
<script type="module">
    // login registerボタンを右上に配置
    jQuery.noConflict();
    jQuery(function() {
        jQuery("div:has(.right_btn)").addClass(".right_btn");
        jQuery(".pc_page-header:has(.right_btn)").css('justify-content', 'right');
    });
    
</script>

</html>