<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users')->with('users',$users);
    }
    public function editUsersForm($id){
        $user=User::find($id);
        return view('admin.editUserForm',['user'=>$user]);

    }
    public function updateUser(Request $request,$id){
        $username=$request->input('username');
        $email=$request->input('email');
        $admin= $request->input('admin');
        $first_name= $request->input('first_name');
        $last_name=$request->input('last_name');
        $location= $request->input('location');
        $arrayToUpdate=array("username"=>$username,"email"=>$email,"admin"=>$admin,
            'first_name'=>$first_name,"last_name"=>$last_name,'location'=>$location);
        DB::table('users')->where('id',$id)->update($arrayToUpdate);
        return redirect()->route('AdminDisplayUsers');


    }
    public function deleteUser($id){
        $user=User::find($id);

        $exists =Storage::disk('local')->exists('public/user_profile_images/'.$user->image);

        if($exists){
            Storage::delete('public/user_profile_images/'.$user->image);
        }
        $user::destroy($id);
        return redirect()->route('AdminDisplayUsers');
    }
    public function editUserImageForm($id){
        $user=User::find($id);
        return view('admin.editUserImageForm',['user'=>$user]);
    }
    public function updateUserProfileImage(Request $request,$id){
        Validator::make($request->all(),['image'=>"required|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        if($request->hasFile("image")){
            $user=User::find($id);

            $exists =Storage::disk('local')->exists('public/user_profile_images/'.$user->image);

            if($exists){
                Storage::delete('public/user_profile_images/'.$user->image);
            }
            $ext=$request->file('image')->getClientOriginalExtension();


            $request->image->storeAs('public/user_profile_images/',$user->image);
            $arrayToUpdate=array('image'=>$user->image);
            DB::table('users')->where('id',$id)->update($arrayToUpdate);
            return redirect()->route('AdminDisplayUsers');
        }


        else{
            $error='No image was selected';
            return $error;
        }

    }
}
