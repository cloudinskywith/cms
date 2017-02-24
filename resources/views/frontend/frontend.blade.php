<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    <!-- QQ在线客服 -->
        <div id="qq-tools" class="qq-rides-cs">
            <div class="qq-tools-l">
                <a id="qq-tools-show" class="qq-tools-open" title="查看在线客服" style="display:block" href="javascript:void(0);">展开</a>
                <a id="qq-tools-hide" class="qq-tools-close" title="关闭在线客服" style="display:none" href="javascript:void(0);">收缩</a>
            </div>
            <div class="qq-tools-r" style="width: 140px;">
                <div class="cn">
                    <h3 class="titZx">在线客服</h3>
                    <ul>
                        <li><span>客服</span>
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=917042364&site=qq&menu=yes" target="_blank">
                                <img border="0" alt="点击这里给我发消息" title="点击这里给我发消息" src="{{asset('images/qqonline.png')}}"/>
                            </a>
                        </li>
                        <li style="border:none;"><span>电话：13610204915</span> </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- QQ在线客服结束 -->
        <div style="height: 1000px;"></div>    @include('partials.footer')

    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var online = new Array();
        $(function(){
            $("#qq-tools-show").click(function(){
                $('#qq-tools').animate({right:'0'});
                $('#qq-tools-show').hide();
                $('#qq-tools-hide').show();
            });
            $("#qq-tools-hide").click(function(){
                $('#qq-tools').animate({right:'-150px'});
                $('#qq-tools-show').show();
                $('#qq-tools-hide').hide();
            });
        });
    </script>
</body>
</html>
