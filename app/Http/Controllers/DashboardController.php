<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Settings;
use App\Section;
use App\Partner;
use App\About;
use App\CustomerSaying;
use App\TeamMember;
use App\BannerImage;
use App\Message;
use App\SocialIcon;
use App\User;
use Carbon\Carbon;
use Storage;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('checkusertype');
    }


    public function dashboard()
    {
        return view("admin.dashboard");
    }


    //Admin setting View Page
    public function admin_setting()
    {
        $users=User::paginate(10);
        return view('admin.admin_setting',compact('users'));
    }


    //Admin Setting Update Function
    public function update_users(Request $update)
    {
        $update->validate([
            "Uname"=>"required",
            "Uemail"=>"required",
            "Upassword"=>"required",
        ],[
            "Uname.required"=>"Please input name",
            "Uemail.required"=>"Please input email",
            "Upassword.required"=>"Please input password",
        ]);

        if ($update->Uimage) {
            Storage::delete(User::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('User Images');
            User::find($update->Uid)->update([
                "name"=>$update->Uname,
                "image"=>$image,
                "email"=>$update->Uemail,
                "password"=>Hash::make($update->Upassword),
                "created_at"=>Carbon::now(),
            ]);
        } else {
            User::find($update->Uid)->update([
                "name"=>$update->Uname,
                "email"=>$update->Uemail,
                "password"=>Hash::make($update->Upassword),
                "created_at"=>Carbon::now(),
            ]);
        }

        return back()->with('update','The information is updated');

    }


    //Settings Page View
    public function settings()
    {
        $number=Settings::count();
        $settings=Settings::first();
        return view('admin.settings',compact('number','settings'));
    }


    //Settings Insert Function
    public function insert_settings(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "logo"=>"required",
            "typing"=>"required",
        ],[
            "title.required"=>"Please input title",
            "logo.required"=>"Please input logo",
            "typing.required"=>"Please input auto typing text",
        ]);

        $logo=$insert->file('logo')->store('Site Logo');
        Settings::insert([
            "title"=>$insert->title,
            "logo"=>$logo,
            "typing"=>$insert->typing,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);

        return back()->with('insert','The settings has been inserted successfully');
    }


    //Settings Update Function
    public function update_settings(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Utyping"=>"required",
        ],[
            "Utitle.required"=>"Please input title",
            "Utyping.required"=>"Please input auto typing text",
        ]);

        if ($update->Ulogo) {
            Storage::delete(Settings::find($update->Uid)->logo);
            $logo=$update->file('Ulogo')->store('Site Logo');
            Settings::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "logo"=>$logo,
                "typing"=>$update->Utyping,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            Settings::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "typing"=>$update->Utyping,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }

        return back()->with('update','The settings have been updated successfully');
    }


    //Settings Delete Function
    public function delete_settings($id)
    {
        Storage::delete(Settings::findorfail($id)->logo);
        Settings::findorfail($id)->delete();
        return back()->with('delete','The settings have been deleted successfully');
    }


    //Section Type View Page
    public function sections()
    {
        $sections=Section::paginate(10);
        return view('admin.sections',compact('sections'));
    }


    //Section Type Insert Function
    public function insert_sections(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input section title",
            "description.required"=>"Please input section description",
        ]);

        Section::insert([
            "title"=>$insert->title,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One section has been inserted');
    }


    //Section Type Update Function
    public function update_sections(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input section title",
            "Udescription.required"=>"Please input section description",
        ]);

        Section::find($update->Uid)->update([
            "title"=>$update->Utitle,
            "description"=>$update->Udescription,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One section has been updated');
    }


    //Section Type Delete Function
    public function delete_section($id)
    {
        Section::findorfail($id)->delete();
        return back()->with('delete','One section has been deleted');
    }



    //Partners view page
    public function partners()
    {
        $partners=Partner::all();
        return view('admin.partners',compact('partners'));
    }


    //Partners Insert Function
    public function insert_partners(Request $insert)
    {
        $insert->validate([
            "name"=>"required",
            "logo"=>"required",
        ],[
            "name.required"=>"Please input partner name",
            "logo.required"=>"Please input partner logo",
        ]);

        $logo=$insert->file('logo')->store('Partner Logos');
        Partner::insert([
            "name"=>$insert->name,
            "logo"=>$logo,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One partner has been inserted');
    }


    //Partners Update Function
    public function update_partners(Request $update)
    {
        $update->validate([
            "Uname"=>"required",
        ],[
            "Uname.required"=>"Please input partner name",
        ]);

        if ($update->Ulogo) {
            Storage::delete(Partner::findorfail($update->Uid)->logo);
            $logo=$update->file('Ulogo')->store('Partner Logos');
            Partner::find($update->Uid)->update([
                "name"=>$update->Uname,
                "logo"=>$logo,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            Partner::find($update->Uid)->update([
                "name"=>$update->Uname,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }

        return back()->with('update','One partner has been updated');
    }


    //Partners Delete Function
    public function delete_partners($id)
    {
        Storage::delete(Partner::findorfail($id)->logo);
        Partner::findorfail($id)->delete();
        return back()->with('delete','One partner has been deleted');
    }




    //About us View Page
    public function aboutUs()
    {
        $abouts=About::paginate(10);
        return view('admin.about',compact('abouts'));
    }


    //About Us Insert Function
    public function insert_aboutUs(Request $insert)
    {
        $insert->validate([
            "title"=>"required",
            "icon"=>"required",
            "image"=>"required",
            "description"=>"required",
        ],[
            "title.required"=>"Please input title",
            "icon.required"=>"Please input icon",
            "image.required"=>"Please input image",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('About Images');
        About::insert([
            "title"=>$insert->title,
            "icon"=>$insert->icon,
            "image"=>$image,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One about us section has been inserted');
    }



    //About us Update Function
    public function update_aboutUs(Request $update)
    {
        $update->validate([
            "Utitle"=>"required",
            "Uicon"=>"required",
            "Udescription"=>"required",
        ],[
            "Utitle.required"=>"Please input title",
            "Uicon.required"=>"Please input icon",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(About::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('About Images');
            About::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "image"=>$image,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            About::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "icon"=>$update->Uicon,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }

        return back()->with('update','One about us section has been updated');
    }



    //About Us Delete Function
    public function delete_aboutUs($id)
    {
        Storage::delete(About::findorfail($id)->image);
        About::findorfail($id)->delete();
        return back()->with('delete','One about us section has been deleted');
    }


    //Customer Sayings View Page
    public function customer_sayings()
    {
        $sayings=CustomerSaying::all();
        return view('admin.customer_sayings',compact('sayings'));
    }


    //Customer Sayings Insert Function
    public function insert_customer_sayings(Request $insert)
    {
        $insert->validate([
            "name"=>"required",
            "image"=>"required",
            "designation"=>"required",
            "description"=>"required",
        ],[
            "name.required"=>"Please input customer name",
            "image.required"=>"Please input customer image",
            "designation.required"=>"Please input designation",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Customer Images');
        CustomerSaying::insert([
            "name"=>$insert->name,
            "image"=>$image,
            "designation"=>$insert->designation,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','Customer sayings have been inserted successfully');
    }


    //Customer Sayings Update Function
    public function update_customer_sayings(Request $update)
    {
        $update->validate([
            "Uname"=>"required",
            "Udesignation"=>"required",
            "Udescription"=>"required",
        ],[
            "Uname.required"=>"Please input customer name",
            "Udesignation.required"=>"Please input designation",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(CustomerSaying::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Customer Images');
            CustomerSaying::find($update->Uid)->update([
                "name"=>$update->Uname,
                "image"=>$image,
                "designation"=>$update->Udesignation,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            CustomerSaying::find($update->Uid)->update([
                "name"=>$update->Uname,
                "designation"=>$update->Udesignation,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','Customer sayings have been updated successfully');
    }


    //Customer Sayings Delete Function
    public function delete_customer_saying($id)
    {
        Storage::delete(CustomerSaying::findorfail($id)->image);
        CustomerSaying::findorfail($id)->delete();
        return back()->with('delete','Customer sayings have been deleted successfully');
    }





    //Banner Images View Page
    public function banner_images()
    {
        $images=BannerImage::paginate(10);
        return view('admin.banner_images',compact('images'));
    }



    //Banner Images Insert Function
    public function insert_banner_images(Request $insert)
    {
        $insert->validate([
            "category"=>"required",
            "image"=>"required",
        ],[
            "category.required"=>"Please input banner image category",
            "image.required"=>"Please input banner image",
        ]);

        $image=$insert->file('image')->store('Banner Images');
        BannerImage::insert([
            "category"=>$insert->category,
            "image"=>$image,
            "title"=>$insert->title,
            "sub_title"=>$insert->sub_title,
            "typewrite"=>$insert->typewrite,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One banner image has been inserted');
    }


    //Banner Images Update Function
    public function update_banner_images(Request $update)
    {
        if ($update->Uimage) {
            Storage::delete(BannerImage::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Banner Images');
            BannerImage::find($update->Uid)->update([
                "image"=>$image,
                "title"=>$update->Utitle,
                "sub_title"=>$update->Usub_title,
                "description"=>$update->Udescription,
                "Typewrite"=>$update->typewrite,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            BannerImage::find($update->Uid)->update([
                "title"=>$update->Utitle,
                "sub_title"=>$update->Usub_title,
                "description"=>$update->Udescription,
                "typewrite"=>$update->typewrite,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One banner image has been updated');
    }



    //Visitor Messages View Page
    public function messages()
    {
        $messages=Message::paginate(10);
        return view('admin.messages',compact('messages'));
    }




    ///////Visitor Message Sending Routes////////
    public function send_message(Request $send)
    {
        $send->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required",
            "message"=>"required",
        ],[
            "first_name.required"=>"Please input your first name",
            "last_name.required"=>"Please input your last name",
            "email.required"=>"Please input your email",
            "message.required"=>"Please leave us your message",
        ]);

        Message::insert([
            "first_name"=>$send->first_name,
            "last_name"=>$send->last_name,
            "email"=>$send->email,
            "phone"=>$send->phone,
            "message"=>$send->message,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','You have successfully sent us your message');
    }



    ///Social Icons view Function
    public function social_icons()
    {
        $icons=SocialIcon::paginate(10);
        return view('admin.social_icons',compact('icons'));
    }



    //Social Icons Insert Function
    public function insert_social_icons(Request $insert)
    {
        $insert->validate([
            "icon"=>"required",
            "link"=>"required",
        ],[
            "icon.required"=>"Please input social icon",
            "link.required"=>"Please input icon link",
        ]);

        SocialIcon::insert([
            "icon"=>$insert->icon,
            "link"=>$insert->link,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One social icon has been inserted');

    }


    //Social Icons Update Function
    public function update_social_icons(Request $update)
    {
        $update->validate([
            "Uicon"=>"required",
            "Ulink"=>"required",
        ],[
            "Uicon.required"=>"Please input social icon",
            "Ulink.required"=>"Please input icon link",
        ]);

        SocialIcon::find($update->Uid)->update([
            "icon"=>$update->Uicon,
            "link"=>$update->Ulink,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One social icon has been updated');
    }



    //Social Icons Delete Function
    public function delete_social_icons($id)
    {
        SocialIcon::findorfail($id)->delete();
        return back()->with('delete','One social icon has been deleted');
    }



    //Team members view page
    public function team_members()
    {
        $members=TeamMember::paginate(10);
        return view('admin.team_members',compact('members'));
    }



    //Team members insert function
    public function insert_members(Request $insert)
    {
        $insert->validate([
            "name"=>"required",
            "designation"=>"required",
            "image"=>"required",
            "description"=>"required",
        ],[
            "name.required"=>"Please input member name",
            "designation.required"=>"Please input designation",
            "image.required"=>"Please input image",
            "description.required"=>"Please input description",
        ]);

        $image=$insert->file('image')->store('Team member image');
        TeamMember::insert([
            "name"=>$insert->name,
            "designation"=>$insert->designation,
            "image"=>$image,
            "description"=>$insert->description,
            "f_icon"=>$insert->f_icon,
            "f_link"=>$insert->f_link,
            "t_icon"=>$insert->t_icon,
            "t_link"=>$insert->t_link,
            "l_icon"=>$insert->l_icon,
            "l_link"=>$insert->l_link,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One team member has been inserted');
    }


    //Update team members function
    public function update_members(Request $update)
    {
        $update->validate([
            "Uname"=>"required",
            "Udesignation"=>"required",
            "Udescription"=>"required",
        ],[
            "Uname.required"=>"Please input member name",
            "Udesignation.required"=>"Please input designation",
            "Udescription.required"=>"Please input description",
        ]);

        if ($update->Uimage) {
            Storage::delete(TeamMember::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Team member image');
            TeamMember::find($update->Uid)->update([
                "name"=>$update->Uname,
                "designation"=>$update->Udesignation,
                "image"=>$image,
                "description"=>$update->Udescription,
                "f_icon"=>$update->Uf_icon,
                "f_link"=>$update->Uf_link,
                "t_icon"=>$update->Ut_icon,
                "t_link"=>$update->Ut_link,
                "l_icon"=>$update->Ul_icon,
                "l_link"=>$update->Ul_link,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            TeamMember::find($update->Uid)->update([
                "name"=>$update->Uname,
                "designation"=>$update->Udesignation,
                "description"=>$update->Udescription,
                "f_icon"=>$update->Uf_icon,
                "f_link"=>$update->Uf_link,
                "t_icon"=>$update->Ut_icon,
                "t_link"=>$update->Ut_link,
                "l_icon"=>$update->Ul_icon,
                "l_link"=>$update->Ul_link,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One team member has been updated');
    }



    //Delete team members function
    public function delete_members($id)
    {
        Storage::delete(TeamMember::findorfail($id)->image);
        TeamMember::findorfail($id)->delete();
        return back()->with('delete','One team member has been deleted');
    }
}
