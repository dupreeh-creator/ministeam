<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Announcement;
class SearchController extends Controller
{
    public function searchGame(Request $request){
        $searchText=$request->get('searchText');
        $games=Game::where('name',"LIKE",$searchText."%")->paginate(3);
        return view('games.allgames',compact('games'));
    }


    public function getResults(Request $request){
        $query= $request->input(
            'query');
        if(!$query){
            return redirect()->route('ministeam');
        }
        $users=User::where(DB::raw("CONCAT(first_name,' ',last_name)"),
        'LIKE',"%{$query}%")
            ->orWhere('username','LIKE',"%{$query}%")
            ->get();

        return view('search.results')->with('users',$users);
    }

}
