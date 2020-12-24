<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
class ProfileController extends Controller
{
    public function getProfile($username){
        $user= User::where('username',$username)->first();
        if(!$user){
            abort(404);
        }
        $statuses=$user->statuses()->notReply()->get();
        return view('profile.index',[
            'user'=>$user,
            'statuses'=>$statuses,
            'authUserIsFriend'=>Auth::user()->friendsWith($user)
        ]);
    }
    public function getEdit(){
        return view('profile.edit');
    }
    public function postEdit(Request $request){
        $this->validate($request,[
            'first_name'=>'alpha|max:25',
            'last_name'=>'alpha|max:25',
            'location'=>'alpha|max:25',
        ]);
        Auth::user()->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'location'=>$request->input('location'),
        ]);
        return redirect()->route('profile.edit')->with('info','Profile successfully updated.＼(≧▽≦)／');
    }
    public function userPage(){
        if(Auth::check()){
            $statuses=Status::notReply()->where(function ($query){
                return $query->where('user_id',Auth::user()->id)->orWhereIn('user_id',Auth::user()->friends()->pluck('id'));
            })
                ->orderBy('created_at','desc')->paginate(4);
            return view('user.index',compact('statuses'));
        }
        return view('ministeam');
    }

}
