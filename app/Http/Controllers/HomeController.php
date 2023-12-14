<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Function for website view
    public function Website_Main_Page()
    {
        $category = Category::all();
        $featured_products = Product::where('trending', '1')->take(4)->get();
        return view('Website.website', compact('featured_products','category'));
    }

    public function Frontend_Category_Page()
    {
        $category = Category::all();
        $trending_category = Category::where('popular', '1')->take(3)->get();
        return view('Website.category', compact('category', 'trending_category'));
    }

    public function View_Category(Request $request, $slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();

            $query = $request->input('query');

            $productQuery = Product::where('category', $category->id);

            if ($query) {
                $productQuery->where('name', 'like', '%' . $query . '%');
            }

            $product = $productQuery->get();

            return view('Website.products', compact('category', 'product', 'query'));
        } else {
            return redirect('/');
        }
    }

    public function Product_Detail($cat_slug, $prod_slug)
    {
        if (Category::where('slug', $cat_slug)->exists()) 
        {
            if (Product::where('slug', $prod_slug)->exists()) 
            {
                $category = Category::all();
                $product = Product::where('slug', $prod_slug)->first();

                return view('Website.detail', compact('category','product'));
            } 
            else 
            {
                return redirect('/');
            }
        } 
        else 
        {
            return redirect('/');
        }
    }
}
