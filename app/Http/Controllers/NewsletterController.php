<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Newsletter;

class NewsletterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }

    function newsletter()
    {
      $newsletters =  Newsletter::orderBy('id', 'desc')->paginate(5);
      return view('newsletter/view', compact('newsletters'));
    }

     function insertnewsletter(Request $request)
       {

            Newsletter::insert([
           'email' => $request->email,
           'created_at' => Carbon::now()
          ]);

           return back()->with('success', 'Thanks for subscribe');

      }


     function deletenewsletter($newsletter_id)
       {
         Newsletter::find($newsletter_id)->delete();
         return back()->with('successdelete', 'Newsletter successfully deleted');
      }

}
