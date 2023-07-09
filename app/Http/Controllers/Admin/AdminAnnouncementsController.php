<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Announce_category;
use Illuminate\Http\Request;

class AdminAnnouncementsController extends Controller
{
    public function getAnnouncements(){

        return view('admin.page.announcements',['announcements'=>Announcement::all(),'announce_categorys'=>Announce_category::all()]);
    }
    public function addAnnouncements(Request $request){
        Announcement::create([
            'name'=>$request->announce_name,
            'announce_category'=>$request->announce_type,
            'picture'=>'#',
            'link'=>$request->link,
        ]);
        return redirect()->back()->with('success','Аннонс успешно добавлен');
    }
    public function addAnnouncementCategory(Request $request){
        Announce_category::create([
            'name'=>$request->category_name,
        ]);
        return redirect()->back()->with('success','Категория аннонс успешна добавлена');
    }
    public function editAnnouncements(Request $request){

    }
}
