<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function Category_Form()
    {
        return view('AdminPanel.Categories.categoryform');
    }

    public function Add_Category(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,webp',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $imagename = microtime().'catimg'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/catimages'),$imagename);

        $category = new Category();
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description = $request->description;
        $category->status=$request->status == TRUE ? '1':'0';
        $category->popular=$request->popular == TRUE ? '1':'0';
        $category->image=$imagename;
        $category->meta_title=$request->meta_title;
        $category->meta_descrip=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->save();
        return redirect()->back()->with('success','Category Added Successfully');
    }

    public function Display_Category(Request $request)
    {
        $search = $request->search;
        
        if (!is_null($search)) 
        {
            $category = Category::where('name', 'LIKE', "%$search%")->get();
            return view('AdminPanel.Categories.categorytable')->with(['categories' => $category , "search" => $search]);
        } 
        else 
        {
            $category = Category::all();
            return view('AdminPanel.Categories.categorytable')->with(['categories' => $category , "search" => $search]);
        }
    }

    public function Edit_Category(string $id)
    {
        $category = Category::find($id);
        return view('AdminPanel.Categories.updatecategory',['category' => $category]);
    }

    public function Update_Category(Request $request,string $id)
    {
        $category = Category::find($id);
        $imagepath = public_path('./admin/catimages/' . $category->image);
        if (File::exists($imagepath)) 
        {
            File::delete($imagepath);
        }
        $newimage = microtime().'catimg'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/catimages'),$newimage);

        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description = $request->description;
        $category->status=$request->status == TRUE ? '1':'0';
        $category->popular=$request->popular == TRUE ? '1':'0';
        $category->image=$newimage;
        $category->meta_title=$request->meta_title;
        $category->meta_descrip=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->save();
        return redirect()->route('category_table')->with('success','Category Updated Successfully');
    }

    public function Destroy_Category(string $id)
    {
        $category = Category::find($id);
        $imagepath = public_path('./admin/catimages/' . $category->image);
        if (File::exists($imagepath)) 
        {
            File::delete($imagepath);
        }
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }

}
