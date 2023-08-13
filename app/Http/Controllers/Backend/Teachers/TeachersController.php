<?php

namespace App\Http\Controllers\Backend\Teachers;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    /**FACULTY INSERT **/
    public function insert(){
        return view('Admin.Faculty.insert');
    }
    
    /**FACULTY INSERT DATA */
    public function insertData(Request $request){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'about' => 'required',
        ]);
        $teacherData = new Teacher();  
        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = 'teacher' . time() . '.' . $extension;
            
            $path = $image->storeAs('teacher', $filename, 'public');
            $imageUrl = env('APP_URL').'/storage/'.$path;
            $teacherData->image = $imageUrl;
        }  
        $teacherData->name = $request->name;
        $teacherData->slug = uniqid(Str::slug($request->name));
        $teacherData->designation = $request->designation;
        $teacherData->phone = $request->phone;
        $teacherData->email = $request->email;
        $teacherData->website = $request->website;
        $teacherData->edu_info = $request->about;
        $teacherData->biography = $request->bio;
        $teacherData->research = $request->research;
        $teacherData->teaching_sub = $request->teaching;
        $teacherData->save();
        return back();
    }


    /**TEACHERS LIST */
    public function teachcersList(){
        $allTeachersData = Teacher::all();
        return view('Admin.Faculty.teachersList',compact('allTeachersData'));
    }
    
}