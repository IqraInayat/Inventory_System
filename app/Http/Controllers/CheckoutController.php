<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function Checkout_Page()
    {
        // $old_cart_items = Cart::where('user_id',Auth::id())->with('product')->get();;
        // foreach ($old_cart_items as $item) 
        // {
        //     if(!Product::where('id',$item->product_id)->where('quantity','>=',$item->product_qty)->exists())
        //     {
        //         $removeitem = Cart::where('user_id',Auth::id())->where('product_id',$item->product_id)->first();
        //         $removeitem->delete();
        //     }
        // }
        $cart_items = Cart::where('user_id', Auth::id())->get();
        return view('Website.checkout', compact('cart_items'));
    }

    public function placeOrder(Request $request)
    {
        if (Auth::user()) {

            $useremail = Auth::user()->email;

            $request->validate([
                "fname" => "required",
                "lname" => "required",
                "email" => "required",
                "phone" => "required",
                "city" => "required",
                "country" => "required",
                "state" => "required",
                "pincode" => "required",
                "address1" => "required",
                "address2" => "required",

            ]);

            $order = new Order();
            $order->user_id = Auth::id();
            $order->fname           = $request->fname;
            $order->lname           = $request->lname;
            $order->order_by    =  $useremail;
            $order->email          = $request->email;
            $order->phone        = $request->phone;
            $order->country  = $request->country;
            $order->city  = $request->city;
            $order->state        = $request->state;
            $order->pincode        = $request->pincode;
            $order->address1        = $request->address1;
            $order->address2        = $request->address2;

            $total = 0;
            $delivery_charges = 500;
            $cartitems_total = Cart::where('user_id', Auth::id())->get();
            foreach ($cartitems_total as $prod) 
            {
                $total += $prod->products->selling_price * $prod->product_qty;
            }
            $order->total_price = $total + $delivery_charges;
            $order->tracking_no = 'Iqra' . rand(346, 789344);
            $order->save();

            $cart_items = Cart::where('user_id', Auth::id())->get();
            foreach($cart_items as $item)
            {
                OrderItem::create([
                    'order_id' => $order->id,
                    'prod_id' => $item->product_id,
                    'qty' => $item->product_qty,
                    'price' => $item->products->selling_price,
                ]);

                $prod = Product::where('id',$item->product_id)->first();
                $prod->quantity = $prod->quantity - $item->product_qty;
                $prod->update();
            }

            $cart_items = Cart::where('user_id', Auth::id())->get();
            Cart::destroy($cart_items);

            return redirect('/')->with('status', 'Order Placed successfully');
        } 
        else 
        {
            return redirect()->route('login');
        }
    }
}
