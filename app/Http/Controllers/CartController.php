<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UniqueService;
use App\User;
use App\Customer;
use Mail;
use App\Mail\OrderConfirm;
use App\Sale;
use App\Order;
use App\Cart;
use App\Coupon;
use App\City;
use App\Country;
use Storage;
use Carbon\Carbon;

class CartController extends Controller
{
  public function cart()
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $cart_products = Cart::where('ip_address', $ip_address)->get();
    return view('carts/cart_view', compact('cart_products'));
  }
  public function addcart($product_id)
  {

    $ip_address = $_SERVER['REMOTE_ADDR'];
    if (Cart::where('product_id', $product_id )->where('ip_address', $ip_address )->exists()) {
      Cart::where('product_id', $product_id )->where('ip_address', $ip_address )->increment('product_quantity');
    }
    else {
      Cart::insert([
        'product_id' => $product_id,
        'ip_address' => $_SERVER['REMOTE_ADDR'],
        'created_at' => Carbon::now(),
      ]);
    }
    return back();
  }
  public function addtocart(Request $request)
  {
    $ip_address= $_SERVER['REMOTE_ADDR'];
      if(Cart::where('product_title',$request->product_title)->where('product_id',$request->product_id)->where('ip_address', $ip_address )->exists()){
        Cart::where('product_title',$request->product_title)->where('product_id',$request->product_id)->where('ip_address', $ip_address )->increment('product_quantity');
      }
      else{
        Cart::insert([
          'product_id' => $request->product_id,
          'main_category' => $request->main_category,
          'product_title' => $request->product_title,
          'product_image' => $request->product_image,
          'product_price' => $request->product_price,
          'ip_address' => $_SERVER['REMOTE_ADDR'],
          'created_at' => Carbon::now(),
        ]);
      }
    return back();
  }
  function cartdelete($cart_id)
  {

    Cart::find($cart_id)->delete();
    return redirect('cart');
  }
  public function updatecart(Request $request)
  {

        if (isset($request->proceed_btn)) {
          $countries = Country::all();
          $cities = City::all();
          $cart_subtotal = $request->cart_subtotal;
          $shipping = $request->shipping;
          $discount = $request->discount;
          $grand_total = $request->grand_total;
          $coupon_amount = $request->coupon_amount;
          $after_coupon_discount = $request->after_coupon_discount;
          return view('checkout/checkout', compact('countries', 'cities', 'cart_subtotal', 'shipping', 'discount', 'grand_total', 'coupon_amount', 'after_coupon_discount'));
        }

         if (isset($request->update_cart)) {
          foreach ($request->jony as $cart_id => $product_quantity)
          {
            Cart::find($cart_id)->update([
              'product_quantity' => $product_quantity
              ]);
            }
            $coupon_by_user = $request->coupon_by_user;
            if(Coupon::where('status', 1)->where('coupon', $coupon_by_user)->exists()){
            $coupon_amount =Coupon::where('coupon', $coupon_by_user)->first()->percentage;
            }
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $cart_products = Cart::where('ip_address', $ip_address)->get();
            return view('carts/cart_view', compact('cart_products', 'coupon_by_user', 'coupon_amount'));
    }
  }
  function finalcheckout(Request $request)
  {
     if(User::where('email', $request->customer_email)->exists())
    {
      $user_id = User::where('email', $request->customer_email)->first()->id;
    }
    else {
      $user_info = User::create([
        'name' => $request->customer_name,
        'email' => $request->customer_email,
        'password' =>bcrypt($request->customer_password)
      ]);
      $user_id = $user_info->id;
      Customer::insert([
        'user_id' => $user_id,
        'customer_mobile'=> $request->customer_mobile,
        'customer_country'=> $request->customer_country,
        'customer_city'=> $request->customer_city,
        'customer_order_note'=> $request->customer_order_note,
        'created_at'=> Carbon::now()
      ]);
    }

    $sale_id = Sale::insertGetId([
      'user_id' => $user_id,
      // 'main_category'  =>$cart_items->main_category,
      'cart_subtotal'  =>$request->cart_subtotal,
      'shipping' =>$request->shipping,
      'discount' =>$request->discount,
      'grand_total' =>$request->grand_total,
      'coupon_discount' =>$request->coupon_discount,
      'after_coupon_discount' =>$request->after_coupon_discount,
      'payment_type' =>$request->payment_type,
      'created_at'=> Carbon::now()
    ]);

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $cart_items = Cart::where('ip_address', $ip_address)->get();
    foreach ($cart_items as $cart_item) {
      Order::insert([
        'sale_id' =>$sale_id,
        'main_category' =>$cart_item->main_category,
        'product_id' =>$cart_item->product_id,
        'product_quantity' =>$cart_item->product_quantity,
        'ip_address' =>$ip_address,
        'created_at'=> Carbon::now()
      ]);
      Cart::find($cart_item->id)->delete();
    }

    return redirect('cart')->with('status', 'success!');
  }
  function getcitylist(Request $request)
  {
    $stringToSend = "<option value=''>Select One</option>";
    $country_id = $request->country_id;
    $cities = City::where('country_id', $country_id)->get();
    foreach ($cities as $city) {
      $stringToSend .= "<option value='$city->id'>$city->name</option>";
    }
    echo $stringToSend;
  }
  function test()
  {

  }
}
