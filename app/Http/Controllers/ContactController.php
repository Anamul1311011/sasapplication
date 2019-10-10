<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }


    //Contact Page View
    public function contacts()
    {
        $contacts=Contact::paginate(10);
        return view('admin.contact',compact('contacts'));
    }

    //Contacts insert function
    public function insert_contact(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "icon"=>"required",
            "phone_email_text"=>"required",
        ],[
            "title.required"=>"Please input title",
            "icon.required"=>"Please input font awesome icon",
            "phone_email_text.required"=>"Please input this field",
        ]);

        Contact::insert([
            "title"=>$insert->title,
            "icon"=>$insert->icon,
            "phone_text_email"=>$insert->phone_email_text,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One contact information has been inserted');
    }


    //Contacts update function
    public function update_contact(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uphone_email_text"=>"required",
        ],[
            "Utitle.required"=>"Please input title",
            "Uicon.required"=>"Please input font awesome icon",
            "Uphone_email_text.required"=>"Please input this field",
        ]);

        Contact::find($update->Uid)->update([
            "title"=>$update->Utitle,
            "icon"=>$update->Uicon,
            "phone_text_email"=>$update->Uphone_email_text,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One contact information has been updated');
    }

    //Contacts Delete Function
    public function delete_contact($id)
    {
        Contact::findorfail($id)->delete();
        return back()->with('delete','One contact information has been deleted');
    }
}
