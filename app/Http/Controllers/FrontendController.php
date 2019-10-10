<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AwesomeApplication;
use App\SaleApplication;
use App\UniqueService;
use App\UniqueServiceFeature;
use App\DevelopmentApplication;
use App\MultipurposeApplication;
use App\StunningApplication;
use App\LatestSaasTechnology;
use Storage;
use App\FrontendFaqCategory;
use App\FrontendFaq;
use Carbon\Carbon;

class FrontendController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('checkusertype');
  }
    //Awesome Applications Page View
    public function awesome_applications()
    {
        $applications=AwesomeApplication::paginate(10);
        return view('admin.applications.awesome_applications',compact('applications'));
    }


    //Awesome Applicatins Insert Function
    public function insert_awesome_applicatins(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "image"=>"required",
            "icon"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input title",
            "image.required"=>"Please input image",
            "icon.required"=>"Please input icon",
            "price.required"=>"Please input price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Awesome App Images');
        AwesomeApplication::insert([
            "title"=>$insert->title,
            "image"=>$image,
            "icon"=>$insert->icon,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One application has been inserted');
    }


    //Awesome Applications Update Function
    public function update_awesome_applicatins(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input title",
            "Uicon.required"=>"Please input icon",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input description",
        ]);


        if ($update->Uimage) {
            Storage::delete(AwesomeApplication::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Awesome App Images');
            AwesomeApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "image"=>$image,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            AwesomeApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One application has been updated');
    }


    //Awesome Applications Delete Function
    public function delete_awesome_application($id)
    {
        Storage::delete(AwesomeApplication::findorfail($id)->image);
        AwesomeApplication::findorfail($id)->delete();
        return back()->with('delete','One application has been deleted');
    }







    //////Unique Services View Page
    public function unique_services()
    {
        $services=UniqueService::paginate(10);
        return view('admin.services.unique_services',compact('services'));
    }



    //Unique Services Insert Function
    public function insert_unique_services(Request $insert)
    {
        $insert->validate([
            "service"=>"required",
            "icon"=>"required",
            "image"=>"required",
            "price"=>"required",
        ],[
            "service.required"=>"Please input service name",
            "icon.required"=>"Please input icon",
            "image.required"=>"Please input service image",
            "price.required"=>"Please input price",
        ]);

        $image=$insert->file('image')->store('Unique Services Images');
        UniqueService::insert([
            "service"=>$insert->service,
            "icon"=>$insert->icon,
            "image"=>$image,
            "price"=>$insert->price,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One unique service has been inserted');

    }


    //Unique Services Update Function
    public function update_unique_services(Request $update)
    {
        $update->validate([
            "Uservice"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
        ],[
            "Uservice.required"=>"Please input service name",
            "Uicon.required"=>"Please input icon",
            "Uprice.required"=>"Please input price",
        ]);

        if ($update->Uimage) {
            Storage::delete(UniqueService::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Unique Services Images');
            UniqueService::find($update->Uid)->update([
                "service"=>$update->Uservice,
                "icon"=>$update->Uicon,
                "image"=>$image,
                "price"=>$update->Uprice,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            UniqueService::find($update->Uid)->update([
                "service"=>$update->Uservice,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One unique service has been updated');
    }


    ///Unique Services Delete Function
    public function delete_unique_services($id)
    {
        Storage:delete(UniqueService::findorfail($id)->image);
        UniqueService::findorfail($id)->delete();
        return back()->with('delete','One service has been deleted');
    }




    //Unique Services View Page
    public function unique_services_features()
    {
        $services=UniqueService::all();
        $features=UniqueServiceFeature::paginate(10);
        return view('admin.services.unique_services_features',compact('services','features'));
    }


    //Unique Services Insert Function
    public function insert_unique_services_features(Request $insert)
    {
        $insert->validate([
            "feature"=>"required",
        ],[
            "feature.required"=>"Please input service feature",
        ]);

        UniqueServiceFeature::insert([
            "service"=>$insert->service,
            "feature"=>$insert->feature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One feature of unique service has been inserted');
    }


    //Unique Services Update Function
    public function update_unique_services_features(Request $update)
    {
        $update->validate([
            "Ufeature"=>"required",
        ],[
            "Ufeature.required"=>"Please input service feature",
        ]);

        UniqueServiceFeature::find($update->Uid)->update([
            "service"=>$update->Uservice,
            "feature"=>$update->Ufeature,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One feature of unique service has been updated');
    }


    //Unique Services Delete Function
    public function delete_unique_services_features($id)
    {
        UniqueServiceFeature::findorfail($id)->delete();
        return back()->with('delete','One feature of unique service has been deleted');
    }



    //Development Applications View Page
    public function development_apps()
    {
        $apps=DevelopmentApplication::paginate(10);
        return view('admin.applications.development_apps',compact('apps'));
    }



    //Development Applications Insert Function
    public function insert_development_applications(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "icon"=>"required",
            "image"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input application title",
            "icon.required"=>"Please input icon",
            "image.required"=>"Please input image",
            "price.required"=>"Please input price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Development Application Images');
        DevelopmentApplication::insert([
            "title"=>$insert->title,
            "image"=>$image,
            "icon"=>$insert->icon,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One development application has been inserted successfully');

    }


    //Development Application update function
    public function update_development_applications(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application title",
            "Uicon.required"=>"Please input icon",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(DevelopmentApplication::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Development Application Images');
            DevelopmentApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "image"=>$image,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            DevelopmentApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One development application has been updated successfully');
    }


    //Development Applications Delete Function
    public function delete_development_applications($id)
    {
        Storage::delete(DevelopmentApplication::findorfail($id)->image);
        DevelopmentApplication::findorfail($id)->delete();
        return back()->with('delete','One development application has been deleted successfully');
    }



    /////Multipurpose Applications View Page
    public function multipurpose_apps()
    {
        $apps=MultipurposeApplication::paginate(10);
        return view('admin.applications.multipurpose_apps',compact('apps'));
    }


    //Multipurpose Applications Insert Function
    public function insert_multipurpose_applications(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "icon"=>"required",
            "image"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input application title",
            "icon.required"=>"Please input icon",
            "image.required"=>"Please input image",
            "price.required"=>"Please input price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Multipurpose Application Images');
        MultipurposeApplication::insert([
            "title"=>$insert->title,
            "image"=>$image,
            "icon"=>$insert->icon,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One multipurpose application has been inserted successfully');
    }



    //Multipurpose Applications Update Function
    public function update_multipurpose_applications(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application title",
            "Uicon.required"=>"Please input icon",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(MultipurposeApplication::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Multipurpose Application Images');
            MultipurposeApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "image"=>$image,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            MultipurposeApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One multipurpose application has been updated successfully');
    }




    //Multipurpose Applications Delete Function
    public function delete_multipurpose_applications($id)
    {
        Storage::delete(MultipurposeApplication::findorfail($id)->image);
        MultipurposeApplication::findorfail($id)->delete();
        return back()->with('delete','One multipurpose application has been deleted successfully');
    }




    /////Stunning Applications View Page
    public function stunning_apps()
    {
        $apps=StunningApplication::paginate(10);
        return view('admin.applications.stunning_apps',compact('apps'));
    }


    //Stunning Applications Insert Function
    public function insert_stunning_applications(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "icon"=>"required",
            "image"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input application title",
            "icon.required"=>"Please input icon",
            "image.required"=>"Please input image",
            "price.required"=>"Please input price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Stunning Application Images');
        StunningApplication::insert([
            "title"=>$insert->title,
            "image"=>$image,
            "icon"=>$insert->icon,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One stunning application has been inserted successfully');
    }



    //Stunning Applications Update Function
    public function update_stunning_applications(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application title",
            "Uicon.required"=>"Please input icon",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(StunningApplication::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Stunning Application Images');
            StunningApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "image"=>$image,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            StunningApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One stunning application has been updated successfully');
    }




    //Stunning Applications Delete Function
    public function delete_stunning_applications($id)
    {
        Storage::delete(StunningApplication::findorfail($id)->image);
        StunningApplication::findorfail($id)->delete();
        return back()->with('delete','One stunning application has been deleted successfully');
    }




    /////On Sale Applications View Page
    public function sale_applications()
    {
        $applications=SaleApplication::paginate(10);
        return view('admin.applications.sale_applications',compact('applications'));
    }


    //On Sale Applications Insert Function
    public function insert_sale_applications(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "icon"=>"required",
            "image"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input application title",
            "icon.required"=>"Please input icon",
            "image.required"=>"Please input image",
            "price.required"=>"Please input price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Sale Application Images');
        SaleApplication::insert([
            "title"=>$insert->title,
            "image"=>$image,
            "icon"=>$insert->icon,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One sale application has been inserted successfully');
    }



    //On Sale Applications Update Function
    public function update_sale_applications(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application title",
            "Uicon.required"=>"Please input icon",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(SaleApplication::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Sale Application Images');
            SaleApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "image"=>$image,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            SaleApplication::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One sale application has been updated successfully');
    }




    //Stunning Applications Delete Function
    public function delete_sale_applications($id)
    {
        Storage::delete(StunningApplication::findorfail($id)->image);
        StunningApplication::findorfail($id)->delete();
        return back()->with('delete','One stunning application has been deleted successfully');
    }


    /////Latest Technologies View Page
    public function latest_technologies()
    {
        $number=LatestSaasTechnology::count();
        $app=LatestSaasTechnology::first();
        return view('admin.latest_technologies',compact('app','number'));
    }


    //Latest Technologies Insert Function
    public function insert_latest_technologies(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "image"=>"required",
            "price"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input application title",
            "image.required"=>"Please input image",
            "price.required"=>"Please input price",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Latest Technology Images');
        LatestSaasTechnology::insert([
            "title"=>$insert->title,
            "image"=>$image,
            "price"=>$insert->price,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','Latest technology has been inserted successfully');
    }



    //Latest Technologies Update Function
    public function update_latest_technologies(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uprice"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input application title",
            "Uprice.required"=>"Please input price",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(LatestSaasTechnology::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Latest Technology Images');
            LatestSaasTechnology::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "image"=>$image,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            LatestSaasTechnology::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "price"=>$update->Uprice,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','Latest saas technology has been updated successfully');
    }




    //Latest Technology Delete Function
    public function delete_latest_technologies($id)
    {
        Storage::delete(LatestSaasTechnology::findorfail($id)->image);
        LatestSaasTechnology::findorfail($id)->delete();
        return back()->with('delete','Latest saas technology has been deleted successfully');
    }



    //Frontend faq categories//
    public function frontend_faq_categories()
    {
        $categories=FrontendFaqCategory::paginate(10);
        return view('admin.frontend_faqs.category',compact('categories'));
    }


    //Frontend Faq Category insert function
    public function insert_frontend_faq_category(Request $insert)
    {
        $insert->validate([
            "category"=>"required",
            "description"=>"required",
        ],[
            "category.required"=>"Please input faq category",
            "description.required"=>"Please input description",
        ]);

        FrontendFaqCategory::insert([
            "category"=>$insert->category,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One category for frontend faq has been inserted');
    }



    //Frontend Faq Category Update Function
    public function update_frontend_faq_category(Request $update)
    {
        $update->validate([
            "Ucategory"=>"required",
            "Udescription"=>"required",
        ],[
            "Ucategory.required"=>"Please input faq category",
            "Udescription.required"=>"Please input description",
        ]);

        FrontendFaqCategory::find($update->Uid)->update([
            "category"=>$update->Ucategory,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One category for frontend faq has been updated');
    }




    //Frontend Faq view Function
    public function frontend_faqs()
    {
        $faqs=FrontendFaq::paginate(10);
        $categories=FrontendFaqCategory::all();
        return view('admin.frontend_faqs.faq',compact('faqs','categories'));
    }



    ///Frontend Faq Insert Function
    public function insert_frontend_faqs(Request $insert)
    {
        $insert->validate([
            "category"=>"required",
            "icon"=>"required",
            "title"=>"required",
            "description"=>"required",
        ],[
            "category.required"=>"Please input faq category",
            "icon.required"=>"Please input faq icon",
            "title.required"=>"Please input faq title or question",
            "description.required"=>"Please input description",
        ]);

        FrontendFaq::insert([
            "category"=>$insert->category,
            "icon"=>$insert->icon,
            "title"=>$insert->title,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','The information of faq has been inserted');
    }




    ///Frontend Faq Update Function
    public function update_frontend_faqs(Request $update)
    {
        $update->validate([
            "Uicon"=>"required",
            "Utitle"=>"required",
            "Udescription"=>"required",
        ],[
            "Uicon.required"=>"Please input icon",
            "Utitle.required"=>"Please input title",
            "Udescription.required"=>"Please input description",
        ]);

        FrontendFaq::find($update->Uid)->update([
            "category"=>$update->Ucategory,
            "icon"=>$update->Uicon,
            "title"=>$update->Utitle,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);

        return back()->with('update','The information of faq has been updated');
    }



    ///Frontend Faq Delete Function
    public function delete_frontend_faq($id)
    {
        FrontendFaq::find($id)->delete();
        return back()->with('delete','The information of faq has been deleted');
    }


}
