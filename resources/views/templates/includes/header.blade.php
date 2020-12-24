<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Home | Mini-Steam</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/css/price-range.css')}}" rel="stylesheet">

    <link href="{{asset('/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('/css/profile.css')}}" rel="stylesheet">

    <script src="{{asset('/js/html5shiv.js')}}"></script>
    <script src="{{asset('/js/respond.min.js')}}"></script>


</head><!--/head-->

<body>

<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            @if(Auth::check())
                <div class="col-sm-12">
                    <div class="logo pull-left">
                        <a href="{{route('allgames')}}"><img src="/images/home/wap.jpg" alt="logo" name="usr"/></a>
                    </div>

                    <div class="shop-menu pull-right">

                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('allgames')}}"><i class="fa fa-money"></i> Mini-Steam</a></li>
                            <li><a href="http://127.0.0.1:8000/games/news"><i class="fa fa-crosshairs"></i> News</a></li>
                            <li><a href="{{route('cardgames')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li class="dropdown"><a
                                    {{Request::is('user/' .Auth::user()->username) ?'active':''}}
                                    href="{{route('profile.index',['username'=>Auth::user()->username])}}"><i
                                        class="fa fa-user"></i> {{Auth::user()->getNameOrUsername()}}

                                </a>
                                <ul role="menu" class="sub-menu">
                                    <li>
                                        <a {{Request::is('friends')?'active':''}} href="{{route('user.index')}}">My simple web-page</a>
                                    </li>
                                    <li>
                                        <a {{Request::is('user/' .Auth::user()->username) ?'active':''}}href="{{route('profile.index',['username'=>Auth::user()->username])}}">My
                                            page</a>
                                    </li>
                                    <li>
                                        <a {{Request::is('profile/edit') ?'active':''}} href="{{route('profile.edit')}}">Edit
                                            profile</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                    @endif
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if(Auth::check())
                                <li><a href="{{route('auth.signout')}}"><i class="fa fa-rocket"></i>Exit</a></li>
                            @else
                                <li class="nav-item {{Request::is('signup')?'active':''}}"><a
                                        href='{{route('auth.signup')}}'
                                        class="nav-link"><i class="fa fa-flag-o"></i>Registration</a>
                                </li>

                                <li class="nav-item {{Request::is('signin')?'active':''}}"><a
                                        href='{{route('auth.signin')}}'
                                        class="nav-link"><i class="	fa fa-heart-o"></i>Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="container">

    @include('templates.includes.alerts')
    @yield('content')

</div>
</body>



