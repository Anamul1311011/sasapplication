<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hosting;
use App\HostingFeature;
use App\HostingOffer;
use Storage;
use Carbon\Carbon;

class HostingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }



    //Hostings View Page
    public function hostings()
    {
        $hostings=Hosting::paginate(10);
        return view('admin.hostings.hosting',compact('hostings'));
    }


    //Hostings Insert Function
    public function insert_hostings(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "image"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input hosting title",
            "image.required"=>"Please input image",
            "price.required"=>"Please input price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Hosting Images');
        Hosting::insert([

            "main_category"=>$insert->main_category,
            "title"=>$insert->title,
            "image"=>$image,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);

        return back()->with('insert','One hosting has been inserted');
    }


    //Hostings Update Function
    public function update_hostings(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input hosting title",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(Hosting::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Hosting Images');
            Hosting::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "image"=>$image,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            Hosting::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }

        return back()->with('update','One hosting has been updated');
    }


    //Hostings Delete Function
    public function delete_hosting($id)
    {
        Storage::delete(Hosting::findorfail($id)->image);
        Hosting::findorfail($id)->delete();
        return back()->with('delete','One hosting has been deleted');
    }


    //Hostings Features View Page
    public function host_features()
    {
        $features=HostingFeature::paginate(10);
        $hostings=Hosting::all();
        return view('admin.hostings.feature',compact('hostings','features'));
    }


    //Hostings Features Insert Function
    public function insert_host_feature(Request $insert)
    {
        $insert->validate([
            "feature"=>"required",
        ],[
            "feature.required"=>"Please input hosting feature",
        ]);

        HostingFeature::insert([
            "hosting"=>$insert->hosting,
            "feature"=>$insert->feature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One feature of specific hosting has been inserted');
    }


    //Hostinge Features Update Function
    public function update_host_feature(Request $update)
    {
        $update->validate([
            "Ufeature"=>"required",
        ],[
            "Ufeature.required"=>"Please input hosting feature",
        ]);

        HostingFeature::find($update->Uid)->update([
            "hosting"=>$update->Uhosting,
            "feature"=>$update->Ufeature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One feature of specific hosting has been updated');
    }


    //Hostings Features Delete Function
    public function delete_host_feature($id)
    {
        HostingFeature::findorfail($id)->delete();
        return back()->with('delete','One feature of specific hosting has been deleted');
    }




    //Hostings Offers View Function
    public function host_offers()
    {
        $offers=HostingOffer::paginate(10);
        return view('admin.hostings.host_offers',compact('offers'));
    }




    //Hostings Offers Insert Function
    public function insert_hosting_offers(Request $insert)
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

        HostingOffer::insert([
            "title"=>$insert->title,
            "offer"=>$insert->offer,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One hosting offer has been inserted successfully');
    }




    //Application Offer Update Function
    public function update_hosting_offers(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uoffer"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application title",
            "Uoffer.required"=>"Please input application offer",
            "Uprice.required"=>"Please input application offer",
            "Udescription.required"=>"Please input offer description",
        ]);

        HostingOffer::find($update->Uid)->update([
            "title"=>$update->Utitle,
            "offer"=>$update->Uoffer,
            "price"=>$update->Uprice,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One hosting offer has been updated successfully');
    }


    //Application Offer Delete Function
    public function delete_hosting_offer($id)
    {
        HostingOffer::findorfail($id)->delete();
        return back()->with('delete','One hosting offer has been deleted successfully');
    }
}
