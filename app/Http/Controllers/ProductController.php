<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function Product_Form()
    {
        $category = Category::all();
        return view('AdminPanel.Products.productform')->with(['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Add_Product(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'quantity' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif,svg'
        ]);

        $imagename = microtime() . 'productimg.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/productimages'), $imagename);

        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->slug = $request->slug;
        $product->quantity = $request->quantity;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->discount = $request->discount;
        $product->trending = $request->trending == TRUE ? '1':'0';
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->image = $imagename;
        $product->save();

        return redirect()->back()->with('success', 'Product Added Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function Display_Product(Request $request)
    {
        $search = $request->search;

        if (!is_null($search)) {
            $product = Product::where('name', 'LIKE', "%$search%")->get();
            return view('AdminPanel.Products.producttable')->with(['products' => $product, "search" => $search]);
        } else {
            $product = Product::all();
            return view('AdminPanel.Products.producttable')->with(['products' => $product, "search" => $search]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Edit_Product(string $id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('AdminPanel.Products.updateproduct')->with(['product' => $product,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update_Product(Request $request, string $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif,svg'
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->slug = $request->slug;
        $product->quantity = $request->quantity;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->discount = $request->discount;
        $product->trending = $request->trending == TRUE ? '1':'0';
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $imagepath = public_path('./admin/productimages/' . $product->image);
        if (File::exists($imagepath)) 
        {
            File::delete($imagepath);
        }

        $newimage = microtime() . 'productimg.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/productimages'), $newimage);
        $product->image= $newimage;
        $product->save();
        return redirect()->route('product_table')->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Destroy_Product(string $id)
    {
        $product = Product::find($id);
        $imagepath = public_path('./admin/productimages/' . $product->image);
        if (File::exists($imagepath)) 
        {
            File::delete($imagepath);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
