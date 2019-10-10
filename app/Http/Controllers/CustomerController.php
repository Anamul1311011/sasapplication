<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sale;
use App\Order;

class CustomerController extends Controller
{
    function customerarea()
    {
      $total_sale = Sale::where('user_id', Auth::id())->count();
      $sales = Sale::where('user_id', Auth::id())->get();
      $total_products = 0;
      foreach ($sales as $sale)
      {
        $products = Order::where('sale_id', $sale->id)->get();
        foreach ($products as $product) {
          $total_products += $product->product_quantity;
        }
      }
      return view('customer/customerarea', compact('total_sale', 'total_products'));
    }
    function purchaseorder()
    {
        $purchaseorders = Sale::where('user_id', Auth::id())->get();
       return view('customer/purchaseorder', compact('purchaseorders'));
    }
    function purchaseorderindividual($sale_id)
    {
      $sale = Sale::find($sale_id);
       return view('customer/purchaseorderindividual', compact('sale'));
    }
    public function viewOrders()
    {
      $orders = Sale::all();
      // $orders = json_decode(json_encode($orders));
      // echo "<pre>"; print_r($orders); die;
      return view('admin.orders.view_orders')->with(compact('orders'));
    }
    public function viewOrdersdetail()
    {
      $sale = Sale::find($sale_id)->all();
      return view('admin.orders.view_orders_detail')->with(compact('sale'));
    }
}
