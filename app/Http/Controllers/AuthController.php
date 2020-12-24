<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    public function getSignUp(){
        return view('auth.signup');
    }
    public function postSignUp(Request $request){
        $this->validate($request,[
           'email'=>'required|unique:users|email|max:255',
           'username'=>'required|unique:users|alpha_dash|max:22',
           'password'=>'required|min:8',
        ]);
        User::create([
            'email'=>$request->input('email'),
            'username'=>$request->input('username'),
            'password'=>bcrypt($request->input('password')),
        ]);
        return redirect()->route('ministeam')->with('info','Your authorization was successful. You may come in.ヽ(・∀・)ﾉ');
    }
    public function getSignIn(){
        return view('auth.signin');
    }
    public function postSignIn(Request $request){
        $this->validate($request,[
            'username'=>'required|alpha_dash|max:22',
            'password'=>'required|min:8',
        ]);
        if(!Auth::attempt($request->only(['username','password']),$request->has('remeberme'))){
            return redirect()->back()->with('info','Your login or password incorrect.');
        }
        return redirect()->route('allgames')->with('info','You in cite.╰(▔∀▔)╯');
    }
    public function getSignOut(){
        Auth::logout();
        return redirect()->route('ministeam');
    }
}
