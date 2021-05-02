<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Category;

class DishController extends Controller
{
    public function create()
    {
    	return view('dish.add_dish');
    }

     public function save(Request $a)
    {
       //  $this->validate($a,[   
       // "title"=>"required|max:50|min:3|", //rules
       // "image"=>"required",
      
       

       //  ]);
     
      $file = $a->file('image');
      
      $filename = 'image'. time().'.'.$a->image->extension();
            
       $file->move("upload/",$filename);
         
         $data = new Dish;
         $data->dish_name = $a->dish_name;
         $data->dish_description = $a->dish_description;
         $data->dish_status = $a->dish_status;
         $data->price = $a->price;
         $data->quantity = $a->quantity;
         $data->category_id = $a->category_id;
          $data->image = $filename;
         $data->save();
         if ($data) {
             # code...
            return redirect("admin/add_dish");
         }
    } 

     public function delete($id)
    {
        // echo $id;
        $data = Dish::find($id);
        $deleted = $data->delete();
        if ($deleted) 
        {
             return redirect('admin/add_dish')->with('message','Successfully Deleted');
        }
    }

     public function edit($id)
    {
        // echo "edit";
        $data = Dish::find($id);
         $d = Category::all();
        return view('admin.dish.edit',compact('data','d'));
    }

    public function update(Request $a)
    {
        // echo "<pre>";
        // print_r($a->all()); // hasFile check karta hai ki image ai hai ya ni
        if ($a->hasFile('image')) 
        {
	            $file = $a->file('image');
	        // dd($file);//dump and die
	        // exit;
	        $filename = 'image'. time().'.'.$a->image->extension();
	            // dd($filename);
	            // exit;
	         $file->move("upload/",$filename);
	         //dd($file);
	         //exit;
	          $data = new Dish;
	         $data->dish_name = $a->dish_name;
	         $data->dish_description = $a->dish_description;
	         $data->dish_status = $a->dish_status;
	         $data->price = $a->price;
	         $data->quantity = $a->quantity;
	         $data->category_id = $a->category_id;
	         $data->image = $filename;
	         $data->save();
	         if ($data) 
	         {
	             return redirect('admin/add_dish');
	         }
        }
        else
        {
             $data = Dish::find($a->id);
             $data->dish_name = $a->dish_name;
	         $data->dish_description = $a->dish_description;
	         $data->dish_status = $a->dish_status;
	         $data->price = $a->price;
	         $data->quantity = $a->quantity;
	         $data->category_id = $a->category_id;
	        
             
             $data->save();
              if ($data) 
            {
             return redirect('admin/add_dish');
            }
        }     
    }
}