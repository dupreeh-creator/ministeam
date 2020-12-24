<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Announcement;


class AdminAnnController extends Controller
{   public function index(){
    $announcements=Announcement::all();
    return view('admin.displayNews',['announcements'=>   $announcements]);

}

    public function editNewsForm($id){
        $announcement=Announcement::find($id);

        return view('admin.editNewsForm',['announcement'=>$announcement]);

    }
    public function editNewsImageForm($id){
        $announcement=Announcement::find($id);
        return view('admin.editNewsImageForm',['announcement'=>$announcement]);
    }
    public function updateNewsImage(Request $request,$id){
        Validator::make($request->all(),['image'=>"required|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        if($request->hasFile("image")){
            $announcement=Announcement::find($id);

            $exists =Storage::disk('local')->exists('public/game_news_images/'.$announcement->image);

            if($exists){
                Storage::delete('public/game_news_images/'.$announcement->image);
            }
            $ext=$request->file('image')->getClientOriginalExtension();


            $request->image->storeAs('public/game_news_images/',$announcement->image);
            $arrayToUpdate=array('image'=>$announcement->image);
            DB::table('announcements')->where('id',$id)->update($arrayToUpdate);
            return redirect()->route('AdminDisplayNews');
        }


        else{
            $error='No image was selected';
            return $error;
        }

    }

//
    public function updateNews(Request $request,$id){
        $title=$request->input('title');
        $description= $request->input('description');
        $full_text= $request->input('full_text');
        $category=$request->input('category');
        $arrayToUpdate=array("title"=>$title,"description"=>$description,
            'full_text'=>$full_text,"category"=>$category);
        DB::table('announcements')->where('id',$id)->update($arrayToUpdate);
        return redirect()->route('AdminDisplayNews');


    }

    public function createNewsForm(){
        return view("admin.createNews");
    }
    public function sendCreateNewsForm(Request $request){
        $title=$request->input('title');
        $description= $request->input('description');
        $full_text= $request->input('full_text');
        $category=$request->input('category');

        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        $ext=$request->file('image')->getClientOriginalExtension();
        $stringImageReformate= str_replace(" ","",$request->input('title'));

        $imageName=$stringImageReformate.".".$ext;
        $imageEncode =File::get($request->image);
        Storage::disk('local')->put('public/game_news_images/'.$imageName,$imageEncode);

        $arrayToInsert=array("title"=>$title,"description"=>$description,"full_text"=>$full_text,
            "image"=>$imageName,"category"=>$category);
        $created=DB::table('announcements')->insert($arrayToInsert);

        if($created){
            return redirect()->route('AdminDisplayNews');
        }else{
            return 'News not created.';
        }


    }
    public function deleteNews($id){
        $announcement=Announcement::find($id);

        $exists =Storage::disk('local')->exists('public/game_news_images/'.$announcement->image);

        if($exists){
            Storage::delete('public/game_news_images/'.$announcement->image);
        }
        Announcement::destroy($id);
        return redirect()->route('AdminDisplayNews');
    }
}
