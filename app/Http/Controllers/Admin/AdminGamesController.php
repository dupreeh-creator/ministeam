<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminGamesController extends Controller
{
    public function index(){
        $games=Game::paginate(5);
        return view('admin.displayGames',['games'=>$games]);
    }
    public function editGameForm($id){
        $game=Game::find($id);
        return view('admin.editGameForm',['game'=>$game]);

    }
    public function editGameImageForm($id){
        $game=Game::find($id);
        return view('admin.editGameImageForm',['game'=>$game]);
    }
    public function updateGameImage(Request $request,$id){
        Validator::make($request->all(),['image'=>"required|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        if($request->hasFile("image")){
            $game=Game::find($id);

        $exists =Storage::disk('local')->exists("public/games_images/".$game->image);

        if($exists){
            Storage::delete('public/games_images/'.$game->image);
        }
        $ext=$request->file('image')->getClientOriginalExtension();


        $request->image->storeAs("public/games_images/",$game->image);
            $arrayToUpdate=array('image'=>$game->image);
        DB::table('games')->where('id',$id)->update($arrayToUpdate);
        return redirect()->route('AdminDisplayGames');
        }


        else{
            $error='No image was selected';
            return $error;
        }

    }

    public function updateGame(Request $request,$id){
        $name=$request->input('name');
        $series=$request->input('series');
        $description= $request->input('description');
        $price= $request->input('price');
        $category=$request->input('category');
        $rates= $request->input('rates');
        $year_id= $request->input('year_id');
        $arrayToUpdate=array("name"=>$name,"series"=>$series,"description"=>$description,
            'price'=>$price,"category"=>$category,'rates'=>$rates,'year_id'=>$year_id);
        DB::table('games')->where('id',$id)->update($arrayToUpdate);
        return redirect()->route('AdminDisplayGames');


    }

    public function createGameForm(){
        return view("admin.create");
    }
    public function sendCreateGameForm(Request $request){
        $name=$request->input('name');
        $series=$request->input('series');
        $description= $request->input('description');
        $price= $request->input('price');
        $category=$request->input('category');
        $rates= $request->input('rates');
        $year_id= $request->input('year_id');
        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        $ext=$request->file('image')->getClientOriginalExtension();
        $stringImageReformate= str_replace(" ","",$request->input('name'));

        $imageName=$stringImageReformate.".".$ext;
        $imageEncode =File::get($request->image);
        Storage::disk('local')->put('public/games_images/'.$imageName,$imageEncode);

        $arrayToInsert=array("name"=>$name,"image"=>$imageName,"series"=>$series,"description"=>$description,
            'price'=>$price,"category"=>$category,'rates'=>$rates,'year_id'=>$year_id);
        $created=DB::table('games')->insert($arrayToInsert);

        if($created){
            return redirect()->route('AdminDisplayGames');
        }else{
            return 'Games not created.';
        }


    }
    public function deleteGame($id){
        $game=Game::find($id);

        $exists =Storage::disk('local')->exists('public/games_images/'.$game->image);

        if($exists){
            Storage::delete('public/games_images/'.$game->image);
        }
        Game::destroy($id);
        return redirect()->route('AdminDisplayGames');
    }
}
