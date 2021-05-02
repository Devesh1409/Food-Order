<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('coupon.add_coupon');
    }

     public function save(Request $a)
    {
        //  $this->validate($a,[   
        // "title"=>"required|max:50|min:3|", //rules
        // "image"=>"required",
      
       

        //  ]);
   
         $data = new Coupon;
         $data->coupon_code = $a->coupon_code;
         $data->coupon_type = $a->coupon_type;
         $data->coupon_value = $a->coupon_value;
         $data->cart_min_value = $a->cart_min_value;
         $data->expired_on =$a->expired_on;
         $data->coupon_status = $a->coupon_status;
         $data->date_time= $a->date_time;
         

        
         $data->save();
         if ($data) {
             # code...
            return redirect("admin/add_coupon");
         }
    } 

     public function delete($id)
    {
        // echo $id;
        $data = Coupon::find($id);
        $deleted = $data->delete();
        if ($deleted) 
        {
             return redirect('admin/add_coupon')->with('message','Successfully Deleted');
        }
    }

     public function edit($id)
    {
        // echo "edit";
        $data = Coupon::find($id);
        return view('admin.coupon.edit',compact('data'));
    }

    public function update(Request $a)
    {
       
       
          $data = Coupon::find($a->id);
         $data->coupon_code = $a->coupon_code;
         $data->coupon_type = $a->coupon_type;
         $data->coupon_value = $a->coupon_value;
         $data->cart_min_value = $a->cart_min_value;
         $data->expired_on =$a->expired_on;
         $data->coupon_status = $a->coupon_status;
         $data->date_time= $a->date_time;
         
         
         $data->save();
         if ($data) {
             return redirect('admin/add_coupon');
         }
        
        else{
         $data = Coupon::find($a->id);
         $data->coupon_code = $a->coupon_code;
         $data->coupon_type = $a->coupon_type;
         $data->coupon_value = $a->coupon_value;
         $data->cart_min_value = $a->cart_min_value;
         $data->expired_on =$a->expired_on;
         $data->coupon_status = $a->coupon_status;
         $data->date_time= $a->date_time;
             
             $data->save();
              if ($data) {
             return redirect('admin/add_coupon');
         }
        } 
    }
}
