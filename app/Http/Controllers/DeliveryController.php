<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Delivery;

class DeliveryController extends Controller
{
    public function create()
    {
    	return view('delivery.add_delivery');
    }

     public function save(Request $a)
    {
        //  $this->validate($a,[   
        // "title"=>"required|max:50|min:3|", //rules
        // "image"=>"required",
      
       

        //  ]);
   
         $data = new Delivery;
         $data->delivery_boy_name = $a->delivery_boy_name;
         $data->phone_no =$a->phone_no;
         $data->password = $a->password;
         $data->status = $a->status;
         $data->date_of_joining = $a->date_of_joining;
         

        
         $data->save();
         if ($data) {
             # code...
            return redirect("admin/add_delivery");
         }
    } 

     public function delete($id)
    {
        // echo $id;
        $data = Delivery::find($id);
        $deleted = $data->delete();
        if ($deleted) 
        {
             return redirect('admin/add_delivery')->with('message','Successfully Deleted');
        }
    }

     public function edit($id)
    {
        // echo "edit";
        $data = Delivery::find($id);
        return view('admin.delivery.edit',compact('data'));
    }

    public function update(Request $a)
    {
       
       
         $data = Delivery::find($a->id);
         $data->delivery_boy_name = $a->delivery_boy_name;
         $data->phone_no =$a->phone_no;
         $data->password = $a->password;
         $data->status = $a->status;
         $data->date_of_joining = $a->date_of_joining;
         
         $data->save();
         if ($data) {
             return redirect('admin/add_delivery');
         }
        
        else{
             $data = Delivery::find($a->id);
              $data->delivery_boy_name = $a->delivery_boy_name;
        	  $data->phone_no =$a->phone_no;
              $data->password = $a->password;
              $data->status = $a->status;
              $data->date_of_joining = $a->date_of_joining;
         
             
             $data->save();
              if ($data) {
             return redirect('admin/add_delivery');
         }
        }
      
    }
}
