<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use Illuminate\Validation\ValidationException;

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
            'location'=>'alpha|max:25',

            $this->validate($request, [
                'first_name' => 'alpha|max:22',
                'last_name' => 'alpha|max:22',
//                'email'=>'unique:users|email|max:255',
                'location' => 'alpha|max:22',
                'password' => '',
            ]);
            Auth::user()->update([
                'first_name'=>$request->input('first_name'),
                'last_name'=>$request->input('last_name'),
//            'email'=>$request->input('email'),
                'location'=>$request->input('location'),
                'password'=>bcrypt($request->input('password')),
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
