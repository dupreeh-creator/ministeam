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
    <link rel="canonical" href="{{asset('https://getbootstrap.com/docs/5.0/examples/album/')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
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
                                    <p>Гоночная игра, разработанная компанией Ivory Tower и изданная Ubisoft для
                                        Microsoft Windows, PlayStation 4 и Xbox One. ..</p>
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
                                    <p>Игра в жанре файтинга, разработанная Bandai Namco Entertainment. Это девятая игра
                                        в серии Tekken и первая игра,.</p>
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
                                    <p>Crysis 2 — мультиплатформенная компьютерная игра, научно-фантастический шутер от
                                        первого лица...</p>
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
<br>
    <div class="container main" style="margin-bottom: 25px;">
        <div class="row mb-1">
            <div class="col-md-8">
                <div class="card flex-md-row mb-4 box-shadow h-md-750">
                    <div class="card-body d-flex flex-column align-items-start">

                        @foreach($announcements as $a)
                            <div class="jumbotron">
                        <h3 class="mb-0">
                            <a class="text-danger" href="{{route('getNews',[$a->id])}}><strong class="d-inline-block mb-2 text-dark">{{$a->title}}</strong></a>
                        </h3>
                            <img class="card-img-right flex-auto d-none d-md-block ml-1" src="<?php echo Storage::url('game_news_images/' . $a['image']);?>" alt="Card image cap" width="550"
                                 height="220" style="max-height: 250px">
                       <br>
                            <br>
                            <p align="justify">{{$a->description}} </p><a class="pull-right btn btn-warning"
                                                                          href="{{route('getNews',[$a->id])}}">Read
                                more...</a>
                            </div>
                            <br>
                            <br>

                        @endforeach

                    </div>

                </div>
            </div>
            <br>
            &nbsp;&nbsp;&nbsp;

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">This is about nothing. But nothing it is everything.</p>
                </div>
                <br>
                <br>

                <div class="p-3">
                    <h4 class="font-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2014</a></li>
                        <li><a href="#">February 2014</a></li>
                        <li><a href="#">January 2014</a></li>
                        <li><a href="#">December 2013</a></li>
                        <li><a href="#">November 2013</a></li>
                        <li><a href="#">October 2013</a></li>
                        <li><a href="#">September 2013</a></li>
                        <li><a href="#">August 2013</a></li>
                        <li><a href="#">July 2013</a></li>
                        <li><a href="#">June 2013</a></li>
                        <li><a href="#">May 2013</a></li>
                        <li><a href="#">April 2013</a></li>
                    </ol>
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

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
