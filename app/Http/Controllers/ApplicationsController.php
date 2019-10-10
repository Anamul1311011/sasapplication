<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicationCategory;
use App\Application;
use App\AppCatDetail;
use App\ApplicationFeature;
use App\ApplicationOffer;
use Storage;
use Carbon\Carbon;

class ApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }


    //Applications Category View Page
    public function application_category()
    {
        $categories=ApplicationCategory::paginate(15);
        return view('admin.applications.category',compact('categories'));
    }

    //Applications Category Insert Function
    public function insert_application_category(Request $insert)
    {
        $insert->validate([
            "category"=>"required",
            "description"=>"required",
        ],[
            "category.required"=>"Please input application category",
            "description.required"=>"Please input description",
        ]);

        ApplicationCategory::insert([
            "category"=>$insert->category,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One application category has been inserted');
    }


    //Applications Category Update Function
    public function update_application_category(Request $update)
    {
        $update->validate([
            "Ucategory"=>"required",
            "Udescription"=>"required",
        ],[
            "Ucategory.required"=>"Please input application category",
            "Udescription.required"=>"Please input description",
        ]);

        ApplicationCategory::find($update->Uid)->update([
            "category"=>$update->Ucategory,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One application category has been updated');
    }



    //Applications Page View
    public function applications()
    {
        $applications=Application::paginate(10);
        $categories=ApplicationCategory::all();
        return view('admin.applications.application',compact('categories','applications'));
    }


    //Applications Insert Function
    public function insert_applications(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "image"=>"required",
            "icon"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input application category",
            "image.required"=>"Please input application image",
            "icon.required"=>"Please input application icon",
            "price.required"=>"Please input price",
            "description.required"=>"Please input application description",
        ]);

        $image=$insert->file('image')->store('Application_Images');
        Application::insert([
            "category"=>$insert->category,
            "main_category"=>$insert->main_category,
            "title"=>$insert->title,
            "image"=>$image,
            "icon"=>$insert->icon,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One application has been inserted');
    }


    //Application Update Function
    public function update_applications(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application category",
            "Uicon.required"=>"Please input application icon",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input application description",
        ]);

        if ($update->Uimage) {
            Storage::delete(Application::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Application_Images');
            Application::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                // "main_category"=>$update->umain_category,
                "title"=>$update->Utitle,
                "image"=>$image,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            Application::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                // "main_category"=>$update->umain_category,
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }

        return back()->with('update','One application has been updated');
    }


    //Applications Delete Function
    public function delete_applications($id)
    {
        Storage::delete(Application::findorfail($id)->image);
        Application::findorfail($id)->delete();
        return back()->with('delete','One application has been deleted');
    }


    //Applications Category Details View Page
    public function application_category_details()
    {
        $details=AppCatDetail::paginate(10);
        $categories=ApplicationCategory::all();
        return view('admin.applications.category_details',compact('categories','details'));
    }


    //Applications Category Details Insert Function
    public function insert_app_cat_details(Request $insert)
    {
        $insert->validate([
            "image"=>"required",
            "price"=>"required",
        ],[
            "image.required"=>"Please input image",
            "price.required"=>"Please input price",
        ]);

        $image=$insert->file('image')->store('App_Cat_Images');
        AppCatDetail::insert([
            "category"=>$insert->category,
            "image"=>$image,
            "price"=>$insert->price,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','The details of one application category has been inserted');
    }

    //Application Category Details Update Function
    public function update_app_cat_details(Request $update)
    {
        $update->validate([
            "Uprice"=>"required",
        ],[
            "Uprice.required"=>"Please input price",
        ]);

        if ($update->Uimage) {
            Storage::delete(AppCatDetail::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('App_Cat_Images');
            AppCatDetail::find($update->Uid)->update([
                "image"=>$image,
                "price"=>$update->Uprice,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            AppCatDetail::find($update->Uid)->update([
                "price"=>$update->Uprice,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','The details of one application category has been updated');
    }

    //Application Category Details Delete Function
    public function delete_app_cat_details($id)
    {
        Storage::delete(AppCatDetail::findorfail($id)->image);
        AppCatDetail::findorfail($id)->delete();
        return back()->with('delete','The details of one application category heve been deleted');
    }


    //Application Features View Page
    public function application_features()
    {
        $features=ApplicationFeature::paginate(10);
        $applications=Application::all();
        return view('admin.applications.app_features',compact('applications','features'));
    }


    //Application Features Insert Function
    public function insert_app_features(Request $insert)
    {
        $insert->validate([
            "feature"=>"required",
        ],[
            "feature.required"=>"Please input application feature",
        ]);

        ApplicationFeature::insert([
            "application"=>$insert->application,
            "feature"=>$insert->feature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One feature of application has been inserted');
    }


    //Applications Features Update Function
    public function update_app_features(Request $update)
    {
        $update->validate([
            "Ufeature"=>"required",
        ],[
            "Ufeature.required"=>"Please input application feature",
        ]);

        ApplicationFeature::find($update->Uid)->update([
            "application"=>$update->Uapplication,
            "feature"=>$update->Ufeature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One feature of application has been updated');
    }


    //Application Feature Delete Function
    public function delete_app_features($id)
    {
        ApplicationFeature::findorfail($id)->delete();
        return back()->with('delete','One feature of application has been deleted');
    }



    //Application Offer view function
    public function application_offers()
    {
        $offers=ApplicationOffer::paginate(10);
        return view('admin.applications.application_offers',compact('offers'));
    }


    //Application Offer Insert Function
    public function insert_application_offers(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "offer"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input application title",
            "offer.required"=>"Please input application offer",
            "price.required"=>"Please input application price",
            "description.required"=>"Please input offer description",
        ]);

        ApplicationOffer::insert([
            "title"=>$insert->title,
            "offer"=>$insert->offer,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One application offer has been inserted successfully');

    }



    //Application Offer Update Function
    public function update_application_offers(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uoffer"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application title",
            "Uoffer.required"=>"Please input application offer",
            "Uprice.required"=>"Please input application price",
            "Udescription.required"=>"Please input offer description",
        ]);

        ApplicationOffer::find($update->Uid)->update([
            "title"=>$update->Utitle,
            "offer"=>$update->Uoffer,
            "price"=>$update->Uprice,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One application offer has been updated successfully');
    }


    //Application Offer Delete Function
    public function delete_application_offer($id)
    {
        ApplicationOffer::findorfail($id)->delete();
        return back()->with('delete','One application offer has been deleted successfully');
    }

}
