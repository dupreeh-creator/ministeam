<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class announcementsController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        return view('news.index', compact('announcements'));
    }

    public function getNews($id)
    {
        $announcement = Announcement::find($id);

        return view('news.news', ['announcement' => $announcement]);
    }

    public function searchNews(Request $request)
    {
        $searchText = $request->get('searchText');
        $announcements = Announcement::where('title', "LIKE", $searchText . "%")->paginate(3);
        return view('news.index', compact('announcements'));
    }
}
