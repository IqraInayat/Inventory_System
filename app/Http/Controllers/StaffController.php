<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function Display_Product(Request $request)
    {
        $search = $request->search;

        if (!is_null($search)) {
            $product = Product::where('name', 'LIKE', "%$search%")->get();
            return view('Staff.product')->with(['products' => $product, "search" => $search]);
        } else {
            $product = Product::all();
            return view('Staff.product')->with(['products' => $product, "search" => $search]);
        }
    }

    public function Orders()
    {
        $orders = Order::where('status','placed')->get();
        return view('Staff.order',compact('orders'));
    }

    public function View_Orders($id)
    {
        $orders = Order::where('id',$id)->first();
        return view('Staff.details',compact('orders'));
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
        return view('Staff.history',compact('orders'));
    }
    
}
