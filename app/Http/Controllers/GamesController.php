<?php

namespace App\Http\Controllers;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class GamesController extends Controller
{
   public function index(Request $request){
    $games=Game::paginate(9);
        if(isset($request->orderBy)){
            if($request->orderBy=='price-low-high'){
                $games= DB::table('games')->orderBy('price')->get();
            }
            if($request->orderBy=='name-high-low'){
                $games=DB::table('games')->orderBy('price','desc')->get();
            }
            if($request->orderBy=='name-a-z'){
                $games=DB::table('games')->orderBy('name')->get();
            }
            if($request->orderBy=='name-z-a'){
                $games=DB::table('games')->orderBy('name','desc')->get();
            }
        }
       if($request->ajax()){
           return view('games.order_by',['games'=>$games])->render();
       }
       return view('games.allgames',compact('games'));
   }
    public function addGameToCart(Request $request,$id){
//       $request->session()->forget("card");
//       $request->session()->flush();
        $prevCart=$request->session()->get('card');
        $card=new Card($prevCart);
        $game=Game::find($id);
        $card->addItem($id,$game);

        $request->session()->put('card',$card);

        return redirect()->route('allgames')->withsuccess('U added the game in ur card.');;
    }

    public function showCard(){
        $card = Session::get('card');
        if($card){
            return view('cardgames',[
                'cartItems'=>$card
            ]);
        }
        else{
            return redirect()->route('allgames')->withsuccess('Nothing in cart. Please add game to card.');
        }
    }
    public function deleteGameFromCard (Request $request,$id){
        $card = $request->session()->get('card');
        if(array_key_exists($id,$card->items)){
            unset($card->items[$id]);
        }
        $prevcard=$request->session()->get('card');
        $updcard=new Card($prevcard);
        $updcard->updatePrice();

        $request->session()->put("card",$updcard);
        return redirect()->route('cardgames');
    }
    public function createOrder(){
        $card=Session::get('card');
        if($card) {
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array("status" => 'on_hold', "date" => $date, "del_date" => $date, "price" => $card->totalPrice);
            $created_order=DB::table('orders')->insert($newOrderArray);
            $order_id = DB::getPdo()->lastInsertId();;

            foreach ($card->items as $card_item) {
                $game_id = $card_item['data']['id'];
                $game_name = $card_item['data']['name'];
                $game_price = $card_item['data']['price'];
                $newGamesInCurrentOrder = array("game_id" => $game_id, "order_id" => $order_id, "game_name" => $game_name, "price" => $game_price);
                $created_order_games = DB::table('order_items')->insert($newGamesInCurrentOrder);
            }
            Session::forget('card');
            return redirect()->route('allgames')->withsuccess('Thank to u for choose us');
        }
        else{
            return redirect()->route('allgames');
        }
    }
    public function ministeam(){
       return view('ministeam');
    }
    public function news(){
        return view('news.index');
    }



   public function RPGgames(){
       $games= DB::table('games')->where('category','RPG')->get();
       return view('games.rpgGames',compact('games'));
   }
    public function FPSGames(){
        $games= DB::table('games')->where('category','FPS')->get();
        return view('games.fpsGames',compact('games'));
    }
    public function TPSGames(){
        $games= DB::table('games')->where('category','TPS')->get();
        return view('games.tcpGames',compact('games'));
    }
    public function ActionGames(){
        $games=DB::table('games')->where('category','Action')->get();
        return view('games.actionGames',compact('games'));
    }


    public function showYear($year_alias){
        $yea=Year::where('alias',$year_alias)->first();
        return view('games.years',['yea'=>$yea]);
    }


}
