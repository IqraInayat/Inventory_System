<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function Go_To_Sale_Page()
    {
        $products = Product::all();
        return view('AdminPanel.Sales.form', compact('products'));
    }
  
    public function recordSale(Request $request)
    {
        $request->validate([
            'sale_date' => 'required|date',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
       
        $saleDate = Carbon::parse($request->input('sale_date'));
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
    
        
        $product = Product::findOrFail($productId);
    
        // Calculate the total revenue
        $totalRevenue = $quantity * $product->selling_price;
    
        // Store the sales transaction
        Sale::create([
            'sale_date' => $saleDate,
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_revenue' => $totalRevenue,
        ]);
    
        return redirect()->back()->with('Success', 'Sale recorded Successfully.');
    }

    public function salesHistory()
    {
        // $sales = Sale::with('product')->orderBy('sale_date', 'desc')->get();
        $sales = Sale::with('product')->orderBy('id', 'asc')->get();
        return view('AdminPanel.Sales.history', compact('sales'));
    }

    public function deleteSale($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        return redirect()->back()->with('success','Sale Record Deleted Successfully');
    }

    public function editSale($id)
    {
        $products = Product::all();
        $sale = Sale::find($id);
        return view('AdminPanel.Sales.update',compact('sale','products'));
    }

    public function updateSale(Request $request,$id)
    {
        $sale = Sale::find($id);
        $sale->sale_date = Carbon::parse($request->input('sale_date'));
        $sale->product_id = $request->input('product_id');
        $sale->quantity = $request->input('quantity');
        $product = Product::findOrFail($sale->product_id);
    
        // Calculate the total revenue
        $totalRevenue = $sale->quantity * $product->selling_price;

        $sale->total_revenue = $totalRevenue;
        $sale->save();
        return redirect()->route('sales_history')->with('success','Sale Record Updated Successfully');
        
    }
}

