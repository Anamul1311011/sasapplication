<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\BannerImage;
use App\Service;
use App\ServiceFeature;
use App\ServicePlan;
use App\ServiceOfferCategory;
use App\ServiceOffer;
use App\UniqueService;
use App\ApplicationCategory;
use App\ApplicationFeature;
use App\AwesomeApplication;
use App\SaleApplication;
use App\StunningApplication;
use App\LatestSaasTechnology;
use App\AppCatDetail;
use App\Application;
use App\ServiceCategory;
use App\Section;
use App\Faq;
use App\FrontendFaq;
use App\FrontendFaqCategory;
use App\Blog;
use App\TeamMember;
use App\CustomerSaying;
use App\MultipurposeApplication;
use App\Contact;
use App\Partner;
use App\About;
use App\DevelopmentApplication;
use App\Hosting;
use App\HostingOffer;
use App\HostingFeature;
use App\ApplicationOffer;
use App\Cart;

class ViewController extends Controller
{

    //Welcome View page
    public function welcome()
    {
        $abouts=About::all();
        $partners=Partner::all();
        $contacts=Contact::all();
        $cust_sayings=CustomerSaying::all();
        $blogs=Blog::all();
        $hostings=Hosting::limit(3)->get();
        $allhostings=Hosting::all();
        $host_offers=HostingOffer::all();
        $develop_section=Section::where('id','3')->first();
        $sale_section=Section::where('id','6')->first();
        $plan_section=Section::where('id','7')->first();
        $faq_section=Section::where('id','8')->first();
        $why_saas_faqs=FrontendFaq::where('category','1')->get();
        $why_saas_cat=FrontendFaqCategory::where('id','1')->first();
        $frequent_faqs=Faq::limit(4)->get();
        $service_feature_section=Section::where('id','4')->first();
        $different_section=Section::where('id','2')->first();
        $app_categories=ApplicationCategory::all();
        $awesome_apps=AwesomeApplication::all();
        $full_managed_appCat=ApplicationCategory::where('id','1')->first();
        $stunning_appCat=ApplicationCategory::where('id','4')->first();
        $app_offers=ApplicationOffer::all();
        $latest_saas_tech=LatestSaasTechnology::first();
        $stunning_apps=StunningApplication::all();
        $developer_apps=DevelopmentApplication::all();
        $software_apps=Application::where('category','5')->get();
        $applications=Application::limit(3)->get();
        $allapplications=Application::all();
        $offer_categories=ServiceOfferCategory::all();
        $features=ServiceFeature::all();
        $plans=ServicePlan::all();
        $services=Service::all();
        $onSale_services=SaleApplication::all();
        $diff_services=UniqueService::all();
        $service_cats=ServiceCategory::limit(4)->get();
        $banner_img=BannerImage::where('id','3')->first();
        $setting=Settings::first();
        $number=Settings::count();
        $number_tech=LatestSaasTechnology::count();


        return view('welcome',compact('setting','number','banner_img','services','features','offer_categories',
        'awesome_apps','service_cats','different_section','diff_services','develop_section','developer_apps',
        'full_managed_appCat','stunning_appCat','stunning_apps','service_feature_section','why_saas_cat','why_saas_faqs',
        'sale_section','onSale_services','plan_section','plans','faq_section','frequent_faqs','blogs','cust_sayings','contacts',
        'partners','software_apps','latest_saas_tech','number_tech','abouts','app_categories','hostings', 'allhostings',
        'host_offers','applications', 'allapplications', 'app_offers'));
    }


    //Contact Page View Function
    public function contact_view()
    {
        $developer_apps=DevelopmentApplication::all();
        $software_apps=Application::where('category','5')->get();
        $services=Service::all();
        $applications=Application::all();
        $setting=Settings::first();
        $partners=Partner::all();
        $contacts=Contact::all();
        $setting=Settings::first();
        $number=Settings::count();
        $hostings=Hosting::all();
        $host_offers=HostingOffer::all();
        $app_offers=ApplicationOffer::all();
        return view('contact',compact('setting','number','contacts','partners','setting','services','software_apps',
        'developer_apps','applications','hostings','host_offers','app_offers'));
    }



    //Application View Page Function
    public function application_view($id)
    {
        $features=ApplicationFeature::where('application',$id)->get();
        $why_saas_faqs=Faq::where('category','1')->get();
        $soft_faqs=Faq::where('category','4')->get();
        $app_reasons=Section::where('id','10')->first();
        $abouts=About::all();
        $software_apps=Application::where('category','5')->get();
        $dedicated_section=Section::where('id','9')->first();
        $matched_app=Application::findorfail($id);
        return view('applications.softwares',compact('matched_app','dedicated_section','software_apps','abouts','app_reasons',
        'why_saas_faqs','soft_faqs','features'));
    }


    //All Applicatins View Function
    public function all_applications()
    {
        return view('applications.all_applications');
    }


    //All Categorized Applications View Page
    public function categorized_apps($id)
    {
        $category=ApplicationCategory::findorfail($id);
        $apps=Application::where('category',$id)->get();
        return view('applications.categorized_apps',compact('apps','category'));
    }


    //Single Awesome application view page
    public function single_awesome_app($id)
    {
        $awesome_app=AwesomeApplication::find($id);
        $all_apps=AwesomeApplication::all();
        return view('applications.single_awesome_app',compact('awesome_app','all_apps'));
    }


    //single application offer view function
    public function single_app_offer($id)
    {
        $matched_offer=ApplicationOffer::find($id);
        $offers=ApplicationOffer::all();
        return view('applications.single_app_offer',compact('matched_offer','offers'));
    }



    //Hosting View Page Function
    public function hosting_view($id)
    {
        $abouts=About::all();
        $features=HostingFeature::where('hosting',$id)->get();
        $matched_host=Hosting::findorfail($id);
        $hostings=Hosting::all();
        return view('hostings.hosting_view',compact('matched_host','features','abouts','hostings'));
    }


    ///Hosting single offer view function
    public function single_host_offer($id)
    {
        $matched_offer=HostingOffer::find($id);
        $offers=HostingOffer::all();
        return view('hostings.single_host_offer',compact('matched_offer','offers'));
    }



    //Web Services View Function
    public function web_services()
    {
        $contacts=Contact::all();
        return view('services.web_services',compact('contacts'));
    }



    //Mobile Apps View Page
    public function mobile_apps()
    {
        return view('mobile_apps');
    }


    //About View Page
    public function about()
    {
        $members=TeamMember::all();
        return view('about',compact('members'));
    }


    //All Services View Function
    public function all_services()
    {
        return view('services.all_services');
    }


    //Single Service View Function
    public function single_service($id)
    {
        $service=Service::find($id);
        return view('services.single_service',compact('service'));
    }


    //Offer View Page
    public function offer_per_cat($id)
    {
        $category=ServiceOfferCategory::where('id',$id)->first();
        $offers=ServiceOffer::where('category',$id)->get();
        return view('services.offer_per_cat',compact('offers','category'));
    }


    //Blog View Function
    public function front_blog()
    {
        $blogs=Blog::all();
        return view('blog',compact('blogs'));
    }


    //Awesome App View Function
    public function single_app($id)
    {
        $awesomes=Application::find($id);
        return view('applications.single_app',compact('awesomes'));
    }


    //Develop App View Function
    public function single_develop_app($id)
    {
        $develop=DevelopmentApplication::find($id);
        $allApps=DevelopmentApplication::all();
        return view('applications.single_develop_app',compact('develop','allApps'));
    }


    //Single Stunning Application View Page
    public function stunning_single_app($id)
    {
        $stunning_app=StunningApplication::find($id);
        $allApps=StunningApplication::all();
        return view('applications.stunning_single_app',compact('allApps','stunning_app'));
    }


    //Front Multipurpose Applications
    public function front_multipurpose_apps()
    {
        $multipurpose_apps=MultipurposeApplication::all();
        return view('applications.multipurpose_apps',compact('multipurpose_apps'));
    }


    ///single onsale app////
    public function single_onsale_app($id)
    {
        $sale_app=SaleApplication::find($id);
        $allSaleApps=SaleApplication::all();
        return view('applications.single_onsale_app',compact('sale_app','allSaleApps'));
    }


    ///Single faq view page///////////
    public function frontend_single_faq($id)
    {
        $single_faq=FrontendFaq::find($id);
        $allFaqs=FrontendFaq::all();
        return view('frontend_single_faq',compact('single_faq','allFaqs'));
    }

    public function allapplications()
    {
      $allapplications = Application::all();
      return view('applications/allapplications', compact('allapplications'));

    }

    public function allhostings()
    {
      $allhostings = Hosting::all();
      return view('hostings/allhosting', compact('allhostings'));

    }

}
