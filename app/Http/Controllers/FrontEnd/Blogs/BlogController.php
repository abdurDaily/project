<?php

namespace App\Http\Controllers\FrontEnd\Blogs;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\BlogSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{

   /*
       ********************** FRONTEND **************
   */
    //** BLOG INDEX
    
    public function index(){
        return view('FrontEnd.Blogs.index');
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
        'category' => 'required|unique:blog_categories,blog_category',
    ]);

    $blogCategory = new BlogCategory();
    $blogCategory->blog_category = Str::slug($request->category);
    $blogCategory->save();
    return back();
  }
  
  /** SUB CATEGORY */
  public function subCategory(){
    $blogCategory = BlogCategory::select('id','blog_category')->get();
    return view('Admin.Blogs.subCategory',compact('blogCategory'));
  }
  /**INSER SUB CATEGORY DATA */
  public function subCategoryInsert(Request $request){
    $request->validate([
        'title' => 'required',
        // 'image' => 'required',
        'category' => 'required',
        'editor' => 'required',
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