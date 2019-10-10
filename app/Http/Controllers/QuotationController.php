<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Quotation;

class QuotationController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('checkusertype');
    }

    function quotation()
    {
      $quotations =  Quotation::orderBy('id', 'desc')->paginate(5);
      return view('quotation/quotation', compact('quotations'));
    }

     function insertquotation(Request $request)
       {

            Quotation::insert([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
           'email' => $request->email,
           'phone' => $request->phone,
           'message' => $request->message,
           'created_at' => Carbon::now()
          ]);

           return back()->with('success', 'Quotation inserted successfully!!');

      }


     function deletequotation($quotation_id)
       {
         Quotation::find($quotation_id)->delete();
         return back()->with('successdelete', 'Quotation successfully deleted');
      }

}
