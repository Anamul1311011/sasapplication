<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FaqCategory;
use App\Faq;
use Storage;
use Carbon\Carbon;

class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }



    //FAQ Categories View Page
    public function faq_categories()
    {
        $categories=FaqCategory::paginate(10);
        return view('admin.faqs.category',compact('categories'));
    }

    //FAQ Categories Insert Function
    public function insert_faq_category(Request $insert)
    {
        $insert->validate([
            "category"=>"required",
        ],[
            "category.required"=>"Please input faq category",
        ]);

        FaqCategory::insert([
            "category"=>$insert->category,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One category of FAQ has been inserted');
    }


    //FAQ Categories Update Function
    public function update_faq_category(Request $update)
    {
        $update->validate([
            "Ucategory"=>"required",
        ],[
            "Ucategory.required"=>"Please input faq category",
        ]);

        FaqCategory::find($update->Uid)->update([
            "category"=>$update->Ucategory,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One category of FAQ has been updated');
    }


    //FAQs View Page
    public function faqs()
    {
        $faqs=Faq::paginate(10);
        $categories=FaqCategory::all();
        return view('admin.faqs.faq',compact('categories','faqs'));
    }


    //FAQs Insert Function
    public function insert_faqs(Request $insert)
    {
        $insert->validate([
            "icon"=>"required",
            "torq"=>"required",
            "description"=>"required",
        ],[
            "icon.required"=>"Please input faq icon",
            "torq.required"=>"Please input title or question",
            "description.required"=>"Please write answer or description",
        ]);

        Faq::insert([
            "category"=>$insert->category,
            "icon"=>$insert->icon,
            "torq"=>$insert->torq,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One FAQ of specific category has been inserted');
    }


    //FAQs Update Function
    public function update_faqs(Request $update)
    {
        $update->validate([
            "Uicon"=>"required",
            "Utorq"=>"required",
            "Udescription"=>"required",
        ],[
            "Uicon.required"=>"Please input faq icon",
            "Utorq.required"=>"Please input title or question",
            "Udescription.required"=>"Please write answer or description",
        ]);

        Faq::find($update->Uid)->update([
            "category"=>$update->Ucategory,
            "icon"=>$update->Uicon,
            "torq"=>$update->Utorq,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One FAQ of specific category has been updated');
    }


    //FAQs Delete Function
    public function delete_faq($id)
    {
        Faq::findorfail($id)->delete();
        return back()->with('delete','One FAQ of specific category has been deleted');
    }
}
