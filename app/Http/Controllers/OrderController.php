<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Orders()
    {
        $orders = Order::where('status','placed')->get();
        return view('AdminPanel.Orders.order',compact('orders'));
    }

    public function View_Orders($id)
    {
        $orders = Order::where('id',$id)->first();
        return view('AdminPanel.Orders.details',compact('orders'));
    }

    public function Update_Order(Request $request,$id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('success','Order Updated Successfully');
    }

    public function Order_History()
    {
        $orders = Order::where('status','completed')->get();
        return view('AdminPanel.Orders.history',compact('orders'));
    }
}
