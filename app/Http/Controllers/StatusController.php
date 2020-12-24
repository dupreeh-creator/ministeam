<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use Auth;

class StatusController extends Controller
{
    public function postStatus(Request $request){
        $this->validate($request,[
            'status'=>'required|max:1000'
        ]);
        Auth::user()->statuses()->create([
            'body'=>$request->input('status')
        ]);
        return redirect()->route('user.index')->with('info','Successfully added!');
    }
    public function postReply(Request $request,$statusId){
        $this->validate($request,["reply-{$statusId}"=>'required|max:1000'],['required'=>'Write below']);
        $status=Status::notReply()->find($statusId);
        if(! $status ){
            redirect()->route('user.index');
        }
        if(! Auth::user()->friendsWith($status->user) && Auth::user()->id!==$status->user->id){
            return redirect()->route('user.index');
        }
        $reply=new Status();
        $reply->body=$request->input("reply-{$status->id}");
        $reply->user()->associate(Auth::user());

        $status->replies()->save($reply);
        return redirect()->back();
    }
}
