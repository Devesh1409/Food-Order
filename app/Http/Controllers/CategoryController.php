<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('category.add_category');
    }

     public function save(Request $a)
    {
        $this->validate($a,[   
       "title"=>"required|max:50|min:3|", //rules
       "image"=>"required",
       

        ]);
      // echo '<pre>';
      // print_r($a->file('image'));
      $file = $a->file('image');
      // dd($file);//dump and die
      // exit;
      $filename = 'image'. time().'.'.$a->image->extension();
            // dd($filename);
            // exit;
       $file->move("upload/",$filename);
         //dd($file);
         //exit;
         $data = new Category;
         $data->title = $a->title;
         $data->status = $a->status;
         $data->date = $a->date;
         $data->image = $filename;
         $data->save();
         if ($data) {
             # code...
            return redirect("admin/add_category");
         }
    } 

    public function delete($id)
    {
        // echo $id;
        $data = Category::find($id);
        $deleted = $data->delete();
        if ($deleted) 
        {
             return redirect('admin/add_category')->with('message','Successfully Deleted');
        }
    }

     public function edit($id)
    {
        // echo "edit";
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
    }

    public function update(Request $a)
    {
        // echo "<pre>";
        // print_r($a->all()); // hasFile check karta hai ki image ai hai ya ni
        if ($a->hasFile('image')) {
            $file = $a->file('image');
        // dd($file);//dump and die
        // exit;
        $filename = 'image'. time().'.'.$a->image->extension();
            // dd($filename);
            // exit;
         $file->move("upload/",$filename);
         //dd($file);
         //exit;
         $data = new Category;
         $data->title = $a->title;
         $data->status = $a->status;
         $data->date = $a->date;
         $data->image = $filename;
         $data->save();
         if ($data) {
             return redirect('admin/add_category');
         }
        }
        else{
             $data = Category::find($a->id);
             $data->title = $a->title;
             $data->status = $a->status;
             $data->date = $a->date;
             $data->save();
              if ($data) {
             return redirect('admin/add_category');
         }
        }
      
    }
}
