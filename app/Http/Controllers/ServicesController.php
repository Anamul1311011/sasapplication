<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceCategory;
use App\Service;
use App\ServiceOption;
use App\ServiceFeature;
use App\ServicePlan;
use App\ServiceOfferCategory;
use App\ServiceOffer;
use Storage;
use Carbon\Carbon;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }


    //Services Category Page View
    public function service_category()
    {
        $categories=ServiceCategory::paginate(10);
        return view('admin.services.category',compact('categories'));
    }


    //Services Category Insert Function
    public function insert_service_category(Request $insert)
    {
        $insert->validate([
            "category"=>"required",
            "title"=>"required",
            "icon"=>"required",
            "image"=>"required",
            "price"=>"required",
        ],[
            "category.required"=>"Please input service category",
            "title.required"=>"Please input title",
            "icon.required"=>"Please input font awesome icon",
            "image.required"=>"Please input category image",
            "price.required"=>"Please input price",
        ]);

        $image=$insert->file('image')->store('Service Category Images');
        ServiceCategory::insert([
            "category"=>$insert->category,
            "title"=>$insert->title,
            "icon"=>$insert->icon,
            "image"=>$image,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);

        return back()->with('insert','One service category has been inserted');
    }


    //Service Category Update Function
    public function update_service_category(Request $update)
    {
        $update->validate([
            "Ucategory"=>"required",
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
        ],[
            "Ucategory.required"=>"Please input service category",
            "Utitle.required"=>"Please input title",
            "Uicon.required"=>"Please input font awesome icon",
            "Uprice.required"=>"Please input price",
        ]);

        if ($update->Uimage) {
            Storage::delete(ServiceCategory::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Service Category Images');
            ServiceCategory::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "image"=>$image,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            ServiceCategory::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }

        return back()->with('update','One service category has been updated');
    }


    //Service Category Delete Function
    public function delete_service_category($id)
    {
        Storage::delete(ServiceCategory::findorfail($id)->image);
        ServiceCategory::findorfail($id)->delete();
        return back()->with('delete','One service category has been deleted');
    }



    //Services View Page
    public function services()
    {
        $services=Service::paginate(10);
        $categories=ServiceCategory::all();
        return view('admin.services.service',compact('categories','services'));
    }


    //Services Insert Function
    public function insert_service(Request $insert)
    {
        $insert->validate([
            "service"=>"required",
            "icon"=>"required",
            "price"=>"required",
        ],[
            "service.required"=>"Please input service name",
            "icon.required"=>"Please input service icon",
            "price.required"=>"Please input price",
        ]);

        Service::insert([
            "category"=>$insert->category,
            "main_category"=>$insert->main_category,
            "service"=>$insert->service,
            "icon"=>$insert->icon,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "offer"=>$insert->offer,
            "sale"=>$insert->sale,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One service has been inserted');
    }


    //Services Update Function
    public function update_service(Request $update)
    {
        $update->validate([
            "Uservice"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
        ],[
            "Uservice.required"=>"Please input service name",
            "Uicon.required"=>"Please input service icon",
            "Uprice.required"=>"Please input price",
        ]);

        Service::find($update->Uid)->update([
            "category"=>$update->Ucategory,
            "service"=>$update->Uservice,
            "icon"=>$update->Uicon,
            "price"=>$update->Uprice,
            "description"=>$update->Udescription,
            "offer"=>$update->Uoffer,
            "sale"=>$update->Usale,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One service has been updated');
    }

    //Services Delete Function
    public function delete_service($id)
    {
        Service::findorfail($id)->delete();
        return back()->with('delete','One service has been deleted');
    }


    //Services Options View Page
    public function service_options()
    {
        $options=ServiceOption::paginate(10);
        $services=Service::all();
        return view('admin.services.options',compact('services','options'));
    }


    //Services Options Insert Function
    public function insert_service_option(Request $insert)
    {
        $insert->validate([
            "option"=>"required",
        ],[
            "option.required"=>"Please input service option",
        ]);

        ServiceOption::insert([
            "service"=>$insert->service,
            "option"=>$insert->option,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One option of specific service has been inserted');
    }

    //Services Update Function
    public function update_service_option(Request $update)
    {
        $update->validate([
            "Uoption"=>"required",
        ],[
            "Uoption.required"=>"Please input service option",
        ]);

        ServiceOption::find($update->Uid)->update([
            "service"=>$update->Uservice,
            "option"=>$update->Uoption,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One option of specific service has been updated');
    }


    //Services Options Delete Function
    public function delete_service_option($id)
    {
        ServiceOption::findorfail($id)->delete();
        return back()->with('delete','One option of specific service has been deleted');
    }


    //Services Features View Page
    public function service_features()
    {
        $features=ServiceFeature::all();
        return view('admin.services.features',compact('features'));
    }


    //Services Features Insert Function
    public function insert_service_feature(Request $insert)
    {
        $insert->validate([
            "feature"=>"required",
        ],[
            "feature.required"=>"Please input service feature",
        ]);

        ServiceFeature::insert([
            "feature"=>$insert->feature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One feature of service has been inserted');
    }


    //Service Features Update Function
    public function update_service_feature(Request $update)
    {
        $update->validate([
            "Ufeature"=>"required",
        ],[
            "Ufeature.required"=>"Please input service feature",
        ]);

        ServiceFeature::find($update->Uid)->update([
            "feature"=>$update->Ufeature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One feature of service has been updated');
    }


    //Services Features Delete Function
    public function delete_service_feature($id)
    {
        ServiceFeature::findorfail($id)->delete();
        return back()->with('delete','One feature of service has been deleted');
    }



    //Service Plans View Page
    public function service_plans()
    {
        $plans=ServicePlan::all();
        return view('admin.services.plans',compact('plans'));
    }


    //Services Plans Insert Function
    public function insert_service_plans(Request $insert)
    {
        $insert->validate([
            "service"=>"required",
            "package"=>"required",
            "basic"=>"required",
            "premium"=>"required",
            "price"=>"required",
        ],[
            "service.required"=>"Please input service name",
            "package.required"=>"Please input packge",
            "basic.required"=>"Please input basic field",
            "premium.required"=>"Please input premium field",
            "price.required"=>"Please input service amount",
        ]);

        ServicePlan::insert([
            "service"=>$insert->service,
            "package"=>$insert->package,
            "basic"=>$insert->basic,
            "premium"=>$insert->premium,
            "price"=>$insert->price,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One service plan has been inserted');
    }


    //Services Plans Update Function
    public function update_service_plans(Request $update)
    {
        $update->validate([
            "Uservice"=>"required",
            "Upackage"=>"required",
            "Ubasic"=>"required",
            "Upremium"=>"required",
            "Uprice"=>"required",
        ],[
            "Uservice.required"=>"Please input service name",
            "Upackage.required"=>"Please input packge",
            "Ubasic.required"=>"Please input basic field",
            "Upremium.required"=>"Please input premium field",
            "Uprice.required"=>"Please input service amount",
        ]);

        ServicePlan::find($update->Uid)->update([
            "service"=>$update->Uservice,
            "package"=>$update->Upackage,
            "basic"=>$update->Ubasic,
            "premium"=>$update->Upremium,
            "price"=>$update->Uprice,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One service plan has been updated');
    }


    //Services Plans Delete Function
    public function delete_service_plan($id)
    {
        ServicePlan::findorfail($id)->delete();
        return back()->with('delete','One service plan has been deleted');
    }


    //Services Offer Categories View
    public function offer_categories()
    {
        $offers=ServiceOfferCategory::all();
        return view('admin.services.offer_categories',compact('offers'));
    }


    //Services Offer Categories Insert Function
    public function insert_offer_categories(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "icon"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input offer category",
            "icon.required"=>"Please input offer icon",
            "description.required"=>"Please input offer description",
        ]);

        ServiceOfferCategory::insert([
            "title"=>$insert->title,
            "icon"=>$insert->icon,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One category of service offer has been inserted');
    }


    //Service Offer Categories Update Function
    public function update_offer_categories(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input offer category",
            "Uicon.required"=>"Please input offer icon",
            "Udescription.required"=>"Please input offer description",
        ]);

        ServiceOfferCategory::find($update->Uid)->update([
            "title"=>$update->Utitle,
            "icon"=>$update->Uicon,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One category of service offer has been updated');
    }


    //Service Offer Categories Delete Function
    public function delete_offer_category($id)
    {
        ServiceOfferCategory::findorfail($id)->delete();
        return back()->with('delete','One category of service offer has been deleted');
    }



    //Services Offers View
    public function service_offers()
    {
        $offers=ServiceOffer::paginate(10);
        $categories=ServiceOfferCategory::all();
        return view('admin.services.offer',compact('categories','offers'));
    }


    //Services Offers Insert Function
    public function insert_service_offer(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "image"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input offer title",
            "image.required"=>"Please input image",
            "price.required"=>"Please input offer price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Service Offer Images');
        ServiceOffer::insert([
            "category"=>$insert->category,
            "title"=>$insert->title,
            "image"=>$image,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One offer of service has been inserted');
    }



    //Services Offer Update Function
    public function update_service_offer(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input offer title",
            "Uprice.required"=>"Please input offer price",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(ServiceOffer::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Service Offer Images');
            ServiceOffer::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                "title"=>$update->Utitle,
                "image"=>$image,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            ServiceOffer::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                "title"=>$update->Utitle,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }
        return back()->with('update','One offer of service has been updated');
    }



    //Services Offer Delete Function
    public function delete_service_offer($id)
    {
        Storage::delete(ServiceOffer::findorfail($id)->image);
        ServiceOffer::findorfail($id)->delete();
        return back()->with('delete','One offer of service has been deleted');
    }
}
