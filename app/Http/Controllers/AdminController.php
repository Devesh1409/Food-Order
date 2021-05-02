<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Delivery;
use App\Coupon;
use App\Dish;

class AdminController extends Controller
{
   

      public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function category()
    {   
        $data=category::all(); 
        return view('admin.category.add_category',compact('data'));
    }


    public function delivery()
    {   
        $data=delivery::all(); 
        return view('admin.delivery.add_delivery',compact('data'));
    }

    public function coupon()
    {   
        $data=coupon::all(); 
        return view('admin.coupon.add_coupon',compact('data'));
    }
    
      public function dish()
    {
        $data=Dish::all();
        $d = Category::all();
        return view('admin.dish.add_dish',compact('data','d'));
    }
}
