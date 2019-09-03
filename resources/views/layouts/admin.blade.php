<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-idth, initial-scale=1">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title')</title>
        
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600"
         rel="stylesheet" type="text/css">
         
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
         
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ARTICLE') }}
                    </a>
                    <button class="navbar-toggler" type="button" 
                    data-toggle="collapse" data-target="#navbarSupportedContent"aria-controls="navbarSupportedConten"
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggle-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                        <ul class="navbar-nav ml-auto">
                            

                        {{-- 以下を追記 --}}
                        <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                            <li><a class="nav-link" href = "{{ route('register') }}">登録</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <li><a class="nav-link" href = "{{ action('Admin\NewsController@create') }}">投稿</a></li>
                                     <a class="nav-link" href = "{{ action('Admin\NewsController@index') }}"><i class="fas fa-home fa-2x" ></i></a>
                                </div>
                            </li>
                            @endguest
                            {{-- 以上までを追記 --}}
                        </ul>
                    </div>
                </div>
            </nav>
            
            <main class="py-4">
                @yield('content')
                @yield('sidebar')
            </main>
        </div>
    </body>
</html>