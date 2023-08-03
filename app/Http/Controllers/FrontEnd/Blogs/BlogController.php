<?php

namespace App\Http\Controllers\FrontEnd\Blogs;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\BlogSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{

   /*
       ********************** FRONTEND **************
   */
  
    //** BLOG INDEX
    public function index(){
       $blogDetails = BlogSubCategory::with('CategoryBlog')->latest()->paginate(6);
       $blogResent = BlogSubCategory::with('CategoryBlog')->latest()->paginate(3);
       return view('FrontEnd.Blogs.index',compact('blogDetails','blogResent'));
    }
    //**BLOG DETAILS */
    public function postDetails($slug){
      $blogDetail = BlogSubCategory::where('slug', $slug)->with('CategoryBlog')->first();
      return view('FrontEnd.Blogs.blogDetail',compact('blogDetail'));
    }




















   /*
        ********************** BACKEND **************
   */
   //** CATEGORY */
   public function category(){
    return view('Admin.Blogs.category');
   }
   
   /** CATEGORY INSERT DATA */
  public function categoryInsert(Request $request){
    
    $request->validate([
        'category' => 'required',
    ]);
    if(BlogCategory::where('title',Str::slug($request->category))->exists()){
      return redirect()->route('category.insert')->withErrors(['category' => 'this category has already tacken']);
    }
    $blogCategory = new BlogCategory();
    $blogCategory->title = Str::slug($request->category);
    $blogCategory->save();
    return back();
  }
  
  /** SUB CATEGORY */
  public function subCategory(){
    $blogCategory = BlogCategory::all();
    return view('Admin.Blogs.subCategory',compact('blogCategory'));
  }
  /**INSER SUB CATEGORY DATA */
  public function subCategoryInsert(Request $request){
    $request->validate([
        'title' => 'required',
        'image' => 'required',
        'category' => 'required',
        'blog_details_one' => 'required',
        'highlight_text' => 'required',
        'blog_details_two' => 'required',
    ]);

    
    
    $subCategory = new BlogSubCategory();
    $subCategory->title = $request->title;
    $subCategory->slug = uniqid(Str::slug($request->title));
    
    if ($request->file('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = 'blog_image_' . time() . '.' . $extension;
        $image->storeAs('public/blog', $filename);
        $subCategory->image = $filename;
      }  
      
    $subCategory->author = Auth::user()->name;
    $subCategory->blog_categorie_id = $request->category;
    $subCategory->title = $request->title;
    $subCategory->blog_details_one = $request->blog_details_one;
    $subCategory->highlight_text = $request->highlight_text;
    $subCategory->blog_details_two = $request->blog_details_two;
    if($request->video){
      $subCategory->video = $request->video;
    }
    $subCategory->save();
    return back();
  }
}