<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserorderController extends Controller
{
    public function User_Order()
    {
        $orders = Order::where('user_id',Auth::id())->get();
        return view('Website.my_orders',compact('orders'));
    }

    public function User_View_Order_Page($id)
    {
        $orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('Website.order_details',compact('orders'));
    }
}
