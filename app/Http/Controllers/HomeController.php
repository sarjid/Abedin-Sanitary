<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Delar;
use App\Model\Delarservice;
use App\Model\Message;
use App\Model\Comment;
use App\Model\Service;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        $subcat = Subcategory::all();
        $delar = Delar::all();
        $delar_p = Delarservice::all();
        $service = Service::all();
        $comment = Comment::all();
        $sub_admin = User::where('role',2)->get();
        $message = Message::all();
        $new_msg = Message::where('status',1)->get();
        $trash = Message::where('status',0)->get();
        return view('home',compact('products','category','delar','sub_admin','message','new_msg','trash','subcat','delar_p','service','comment'));
    }
}
