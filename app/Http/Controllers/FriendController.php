<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
class FriendController extends Controller
{
    public function getIndex(){
        $friends=Auth::user()->friends();
        $requests=Auth::user()->friendRequest();
        return view('friends.index',[
            'friends'=>$friends,
            'requests'=>$requests
        ]);

    }
    public function getAdd($username){
        $user=User::where('username',$username)->first();

        if(!$user){
            return redirect()->route('ministeam')->with('info','Not find user.');
        }
        if(Auth::user()->id === $user->id){
            return redirect()->route('ministeam');
        }
        if(Auth::user()->hasFriendRequest($user) || $user->hasFriendRequest(Auth::user())){
            return redirect()->route('profile.index',['username'=>$user->username])->with('info','Request to be friend was send.');
        }
        if(Auth::user()->friendsWith($user)){
            return redirect()->route('profile.index',['username'=>$user->username])->with('info','User already in friend list.');
        }
        Auth::user()->addFriend($user);
        return redirect()->route('profile.index',['username'=>$username])->with('info','Request to be friend was send.');
    }
    public function getAccept($username){
        $user=User::where('username',$username)->first();

        if(!$user){
            return redirect()->route('ministeam')->with('info','Not find user.');
        }
        if(!Auth::user()->hasFriendRequestRec($user)){
            return redirect()->route('ministeam');

        }
        Auth::user()->acceptFriendReq($user);
        return redirect()->route('profile.index',['username'=>$username])->with('info','Request to be friend was accepted.');

    }
    public function postDeleteFriend($username){
        $user= User::where('username',$username)->first();
        if(!Auth::user()->friendsWith($user)){
            return redirect()->back();
        }
        Auth::user()->deleteFriend($user);
        return redirect()->back()->with('info','Successfully deleted!');
    }

}
