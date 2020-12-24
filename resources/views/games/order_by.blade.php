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
                        <a href="{{route('AddToCartGame',['id'=>$game->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy the game</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>

                </ul>
            </div>
        </div>
    </div>
@endforeach
