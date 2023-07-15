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
      
        $blogDetails = BlogCategory::with('SubBlog')->latest()->paginate(3);
      //  dd($blogDetails);
        
        return view('FrontEnd.Blogs.index',compact('blogDetails'));
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
        'category' => 'required|unique:blog_categories,title',
    ]);

    $blogCategory = new BlogCategory();
    $blogCategory->title = Str::slug($request->category);
    $blogCategory->save();
    return back();
  }
  
  /** SUB CATEGORY */
  public function subCategory(){
    $blogCategory = BlogCategory::with('SubBlog')->get();
   // dd($blogCategory);
    return view('Admin.Blogs.subCategory',compact('blogCategory'));
  }
  /**INSER SUB CATEGORY DATA */
  public function subCategoryInsert(Request $request){
    $request->validate([
        'title' => 'required',
        'image' => 'required|dimensions:width=260,height=200',
        'category' => 'required',
        'editor' => 'required',
    ],[
      'image.dimensions' => 'image size have to be 260px ,200px ',
    ]);

    
    
    $subCategory = new BlogSubCategory();
    $subCategory->title = $request->title;
    
    if ($request->file('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = 'blog_image_' . time() . '.' . $extension;
        $image->storeAs('public/blog', $filename);
        $subCategory->image = $filename;
      }  
      
    $subCategory->author = Auth::user()->name;
    $subCategory->blog_categorie_id = $request->category;
    $subCategory->editor = $request->editor;
    $subCategory->title = $request->title;
    $subCategory->save();
    return back();
  }
}