@extends('ministeam')
@section('center')



    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.html" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>

                            <li><a href="404.html">404</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="searchGame" method="get">
                        <input type ='text' name="searchText" placeholder="search"/>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    </header><!--/header-->

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>Mini</span>-Steam</h1>
                                    <h2>Half-life 3</h2>
                                    <p>Третья часть культовой серии экшенов. Пока без каких-либо подробностей. По Сети бродит масса слухов, указывающих на существование игры. Но Valve либо опровергает их, либо попросту игнорирует.  </p>
                                    <button type="button" class="btn btn-default get">Read more</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/slider/half.png" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Mini</span>-Steam</h1>
                                    <h2>GTA 6</h2>
                                    <p>Grand Theft Auto 6 – разрабатываемый в настоящее время силами Rockstar North экшен с элементами шутера и гонок в огромном открытом мире.. Игра сохранит обилие виртуальных развлечений, превосходящих по объему реальную жизнь. </p>
                                    <button type="button" class="btn btn-default get">Read more</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/slider/grand.png" class="girl img-responsive" alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Mini</span>-Steam</h1>
                                    <h2>Silent hill</h2>
                                    <p>Хоррор от первого лица в игровой вселенной Silent Hill. Разработкой занимался знаменитый гейм-дизайнер Хидео Кодзима в сотрудничестве с режиссёром Гильермо Дель Торо, главную роль исполнял актёр Норман Ридус.</p>
                                    <button type="button" class="btn btn-default get">Read more</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/slider/silent.png" class="girl img-responsive" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('tcpGames')}}">TCP</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('fpsGames')}}">FPS</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('rpgGames')}}">RPG</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('actionGames')}}">Action</a></h4>
                                </div>
                            </div>
                        </div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Game By Years</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($years as $year)
                                        <li><a href="{{route('yearGame',$year->alias)}}"> <span class="pull-right"></span>{{$year->year}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        <br>
                        <br>
                        <br>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content">

                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product-sorting_btn" data-order="default"><span>Default</span></li>
                                            <li class="product-sorting_btn" data-order="price-low-high"><span>Price: Low-High</span></li>
                                            <li class="product-sorting_btn" data-order="price-high-low"><span>Price: High-Low</span></li>
                                            <li class="product-sorting_btn" data-order="name-a-z"><span>Name: A-Z</span></li>
                                            <li class="product-sorting_btn" data-order="name-z-a"><span>Name: Z-A</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="results">Showing <span>{{$games->count()}}</span> games</div>
                    </div>


                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Games</h2>
                        @foreach($games as $game)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <img src="{{Storage::disk('local')->url('games_images/'.$game->image)}}" width="220" height="200" alt="" />
                                            <h2>${{$game->price}}</h2>
                                            <p>{{$game->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy the game</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{$game->price}}</h2>
                                                <p>{{$game->category}}</p>
                                                <p>{{$game->name}}</p>
                                                <p>{{$game->description}}</p>
                                                    <a href="{{route('AddToCartGame',['id'=>$game->id])}}" class="btn btn-default add-to-cart" name="add_to_cart"><i class="fa fa-shopping-cart"></i>Buy the game</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>View the game </a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div ><!--features_items-->

                    <div>
                        <button  class="btn ">{{$games->links()}}</button>
                    </div>

                    <br>

                </div>
            </div>
        </div>
    </section>
    @endsection
