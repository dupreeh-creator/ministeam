@extends('ministeam')
@section('center')
    <div class="container">
        @include("templates.includes.alerts")
    </div>
    <link href="{{asset('/news/style.css')}}" rel="stylesheet">
    <link href="{{asset('/news/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/news/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/news/images/logo.png')}}" rel="shortcut icon" type="image/png"/>
    <link rel="stylesheet" href="{{asset('/news/flexslider.css')}}" type="text/css"/>
    <link href="{{asset('/news/css/owl.carousel.css')}}" rel="stylesheet">
    <script src="{{asset('/news/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/news/base.js')}}"></script>
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">News<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a
                                    {{Request::is('user/' .Auth::user()->username) ?'active':''}}
                                    href="{{route('profile.index',['username'=>Auth::user()->username])}}"><i
                                        class="fa fa-user"></i> {{Auth::user()->getNameOrUsername()}}

                                </a>
                                <ul role="menu" class="sub-menu">
                                    <li>
                                        <a {{Request::is('friends')?'active':''}} href="{{route('friend.index')}}">Friends</a>
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
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="searchNews" method="get">
                            <input type='text' name="searchText" placeholder="search"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    </header><!--/header-->

    <!--/slider-->
    <div class="container">
        <div class="col-md-12 flexslider loading">
            <ul class="slides">
                <li>
                    <img src="{{asset('news/images/thecrew2.jpg')}}">
                    <div class="flex-caption ">
                        <div class="container">
                            <div class="right">
                                <div class="flex-content">
                                    <h1>The Crew 2</h1>
                                    <hr/>
                                    <p>Гоночная игра, разработанная компанией Ivory Tower и изданная Ubisoft для Microsoft Windows, PlayStation 4 и Xbox One. ..</p>
                                    <a href="#" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="{{asset('news/images/tekken7.jpg')}}">
                    <div class="flex-caption ">
                        <div class="container">
                            <div class="right">
                                <div class="flex-content">
                                    <h1>Tekken 7</h1>
                                    <hr/>
                                    <p>Игра в жанре файтинга, разработанная Bandai Namco Entertainment. Это девятая игра в серии Tekken и первая игра,.</p>
                                    <a href="#" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="{{asset('news/images/crysis2.jpg')}}">
                    <div class="flex-caption ">
                        <div class="container">
                            <div class="right">
                                <div class="flex-content">
                                    <h1>Crysis 2</h1>
                                    <hr/>
                                    <p>Crysis 2 — мультиплатформенная компьютерная игра, научно-фантастический шутер от первого лица...</p>
                                    <a href="#" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 slogan text-center">
            <div class="row">
                <h2>Mini-Steam</h2>
            </div>
        </div>

    </div>

    <div class="container main" style="margin-bottom: 25px;">
        <div class="row">
            <div class="col-md-3 col-md-push-9">
                <h4>Popular News <span class="fw-semi-bold">Filtering</span></h4>
                <p class="text-muted fs-mini">Awesome news:</p>
                <ul class="nav nav-pills nav-stacked search-result-categories mt">
                    <li><a href="#">Announcement <span class="badge">34</span></a>
                    </li>
                    <li><a href="#">Updates <span class="badge">9</span></a>
                    </li>
                    <li><a href="#">RIP projects</a>
                    </li>
                    <li><a href="#">Cyber sport</a>
                    </li>
                    <li><a href="#">Season games <span class="badge">18</span></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9 col-md-pull-3">
                <div class="search-result-item-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h2>{{$announcement->title}}</h2>
                            <img src="<?php echo Storage::url('game_news_images/'.$announcement['image']);?>" alt="img"
                                 width="600"
                                 height="300" style="max-height: 290px">
                            <br>
                            <br><br>
                            <p align="justify">{{$announcement->full_text}} </p
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>



    <script src="{{asset('news/js/owl.carousel.js')}}"></script>
    <script src="{{asset('news/js/functions.js')}}"></script>
    <script type="text/javascript" src="{{asset('news/flexslider.js')}}"></script>
    <script src="{{asset('news/js/bootstrap.min.js')}}"></script>
    </body>
    </html>
@endsection

