<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\BlogCategory;
use App\BlogWriter;
use App\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }


    //Blog Categories View Page
    public function blog_categories()
    {
        $categories=BlogCategory::all();
        return view('admin.blogs.category',compact('categories'));
    }


    //Blogs Categories Insert Function
    public function insert_blog_category(Request $insert)
    {
        $insert->validate([
            "category"=>"required",
        ],[
            "category.required"=>"Please input blog category",
        ]);
        BlogCategory::insert([
            "category"=>$insert->category,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One category of blog has been inserted');
    }


    //Blogs Categories Update Function
    public function update_blog_category(Request $update)
    {
        $update->validate([
            "Ucategory"=>"required",
        ],[
            "Ucategory.required"=>"Please input blog category",
        ]);
        BlogCategory::find($update->Uid)->update([
            "category"=>$update->Ucategory,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('update','One category of blog has been updated');
    }



    //Blogs Writers View Page
    public function blog_writers()
    {
        $writers=BlogWriter::all();
        return view('admin.blogs.writer',compact('writers'));
    }


    //Blogs Writers Insert Function
    public function insert_blog_writer(Request $insert)
    {
        $insert->validate([
            "name"=>"required",
            "image"=>"required",
        ],[
            "name.required"=>"Please input writer name",
            "image.required"=>"Please input writer image",
        ]);

        $image=$insert->file('image')->store('Writer Images');
        BlogWriter::insert([
            "name"=>$insert->name,
            "image"=>$image,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One blog writer has been inserted');
    }


    //Blogs Writers Update Function
    public function update_blog_writer(Request $update)
    {
        $update->validate([
            "Uname"=>"required",
        ],[
            "Uname.required"=>"Please input writer name",
        ]);

        if ($update->Uimage) {
            Storage::delete(BlogWriter::findorfail($update->Uid)->image);
            $image=$update->file('Uimage')->store('Writer Images');
            BlogWriter::find($update->Uid)->update([
                "name"=>$update->Uname,
                "image"=>$image,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            BlogWriter::find($update->Uid)->update([
                "name"=>$update->Uname,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One blog writer has been updated');
    }


    //Blogs Writers Delete Function
    public function delete_blog_writer($id)
    {
        Storage::delete(BlogWriter::findorfail($id)->image);
        BlogWriter::findorfail($id)->delete();
        return back()->with('delete','One blog writer has been deleted');
    }


    //Blogs View Page
    public function blogs()
    {
        $blogs=Blog::paginate(10);
        $writers=BlogWriter::all();
        $categories=BlogCategory::all();
        //dd($blogs,$writers,$categories);
        //dd($blogs[0]->categoryName);
        return view('admin.blogs.blog',compact('writers','categories','blogs'));
    }


    //Blogs Insert Function
    public function insert_blogs(Request $insert)
    {
        $insert->validate([
            "thumbnail"=>"required",
            "description"=>"required",
        ],[
            "thumbnail.required"=>"Please input blog thumbnail image",
            "description.required"=>"Please input blog description",
        ]);

        $thumbnail=$insert->file('thumbnail')->store('Blog Images');
        Blog::insert([
            "category"=>$insert->category,
            "writer"=>$insert->writer,
            "thumbnail"=>$thumbnail,
            "description"=>$insert->description,
            "created_at"=>Carbon::now(),
        ]);
        return back()->with('insert','One blog has been inserted successfully');
    }


    //Blogs Update Function
    public function update_blogs(Request $update)
    {
        $update->validate([
            "Udescription"=>"required",
        ],[
            "Udescription.required"=>"Please input blog description",
        ]);

        if ($update->Uthumbnail) {
            Storage::delete(Blog::findorfail($update->Uid)->thumbnail);
            $thumbnail=$update->file('Uthumbnail')->store('Blog Images');
            Blog::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                "writer"=>$update->Uwriter,
                "thumbnail"=>$thumbnail,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        } else {
            Blog::find($update->Uid)->update([
                "category"=>$update->Ucategory,
                "writer"=>$update->Uwriter,
                "description"=>$update->Udescription,
                "created_at"=>Carbon::now(),
            ]);
        }


        return back()->with('update','One blog has been updated successfully');
    }


    //Blogs Delete Function
    public function delete_blogs($id)
    {
        Storage::delete(Blog::findorfail($id)->thumbnail);
        Blog::findorfail($id)->delete();
        return back()->with('delete','One blog has been deleted');
    }
}
