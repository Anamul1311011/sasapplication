<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
use Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function makestoragelink(){
        Artisan::call('storage:link');
        echo 'link has been created successfully';
    }
    public function addcoupon()
    {
      $coupons = Coupon::where('status', 1)->get();
      return view('coupon/view', compact('coupons'));
    }
    public function insertcoupon(Request $request)
    {
      if (Coupon::where('status', 1)->where('percentage', $request->percentage)->exists()) {
        echo "All ready used!!";
      }
      else {
        $info = Coupon::create([
          'coupon' => "",
          'percentage' => $request->percentage,
        ]);

        $coupon = str_random(4).$info->id;
        $info->coupon = $coupon;
        $info->save();
        return back();
      }

    }
}
