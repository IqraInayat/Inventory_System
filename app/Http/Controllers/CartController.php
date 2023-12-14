<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => 'This product is already in your cart']);
                } else {
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->product_id = $product_id;
                    $cart->product_qty = $product_qty;
                    $cart->save();
                    return response()->json(['status' => $prod_check->name . ' Added to Cart']);
                }
            }
        } else {
            return response()->json(['status' => 'login to continue!!']);
        }
    }

    public function View_Cart()
    {
        $cart_items = Cart::where('user_id',Auth::id())->get();
        // $cart_items_count = $cart_items->count();
        return view('Website.cart',compact('cart_items'));
    }

    public function Delete_Item(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Cart::where('product_id',$prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart_item = Cart::where('product_id',$prod_id)->where('user_id', Auth::id())->first();
                $cart_item->delete();
                // $cart_count = Cart::where('user_id', Auth::id())->count();
                return response()->json(['status' => 'Deleting Product']);
            }
        }
        else
        {
            return response()->json(['status' => 'login to continue!!']);
        }
    }

    public function Update_cart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');
        if(Auth::check())
        {
            if(Cart::where('product_id',$prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart = Cart::where('product_id',$prod_id)->where('user_id', Auth::id())->first();
                $cart->product_qty = $prod_qty;
                $cart->save();
                return response()->json(['status' => 'Quantity Updated']);
            }
        }
    }

    
}
