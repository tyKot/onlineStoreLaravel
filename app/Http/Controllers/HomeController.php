<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index',['products'=>Product::all()]);
    }

    public function sendMail(Request $request){
        $details=[
            'user_name'=>$request->user_name,
            'user_email'=>$request->user_email,
            'message'=>$request->message,
        ];


        \Mail::to('max.shikin03@mail.ru')->send(new \App\Mail\SendBack($details));
        return redirect()->back()->with('success','Письмо отправлено');
    }
}
