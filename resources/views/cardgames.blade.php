@extends('ministeam')

@section('center')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Buying game</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems->items as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{Storage::disk('local')->url('games_images/'.$item['data']['image'])}}" width="120" height="120" alt=""></a>
                        </td>

                        <td class="cart_description">
                            <h4><a href="">{{$item['data']['name']}}</a></h4>

                        </td>

                        <td class="cart_price">
                            <p>{{$item['data']['price']}}</p>
                        </td>

                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('DeleteGameFromCard',['id'=>$item['data']['id']])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
                <tfoot>
                <tr class="cart_menu">
                    <td class="image">Total</td>
                    <td class="description"></td>
                    <td class="price"></td>
                    <td class="total">$ {{$cartItems->totalPrice}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">

            <div class="col-md-6">
                <div class="total_area">
                    <ul>
                        <li>Total <span>${{$cartItems->totalPrice}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href={{route('allgames')}}>Exit</a>
                    <a class="btn btn-default check_out" href="{{route('createOrder')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection

