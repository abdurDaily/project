<?php

namespace App\Http\Controllers\Backend\Attendance;

use App\Http\Controllers\Controller;
use App\Models\AdmitStudent;
use App\Models\Attendance;
use App\Models\AttendanceStore;
use App\Models\Batch_number;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //* ADD NEW BATCH 
    public function addNewBatch(){
        return view('Admin.Attendance.addNewBatch');
    }
    
    //* INSERT ADD NEW BATCH INDATABASE  
    public function insertAddNewBatch(Request $request){
        $validated = $request->validate([
            'batch_no' => 'required',
        ]);
    
        $batchNo = new Batch_number();
        $batchNo->batch_no = $request->batch_no;
        $batchNo->save();
        return back();
    }

    //* ADMIT STUDENTS 
    public function admitStudent(){
        $batchNo = Batch_number::all();
        return view('Admin.Attendance.AdmitStudents',compact('batchNo'));
    }

    //* ADMIT STUDENT IN DATABASE 
    public function admitStudentDatabase(Request $request){
        $admitStudent = new AdmitStudent();
        $admitStudent->std_name = $request->std_name;
        $admitStudent->std_id = $request->std_id;
        $admitStudent->batch_number = $request->batch_no;
        $admitStudent->save();
        return back();
        
    }

    //* PRESENT STUDENTS 
    public function presentStudents(){
        $result = Batch_number::all();
        return view('Admin.Attendance.present',compact('result'));
    }


    public function checkPresent(Request $request){
        $result = Batch_number::all();
        $studentInfo = AdmitStudent::where('batch_number',$request->batch_id)->get();
        return view('Admin.Attendance.present',compact('studentInfo','result'));
    }


    public function submitAttendance(Request $request){
        $AttendanceRecord = new Attendance();
        $AttendanceRecord->batch_number_id = $request->check_id;
        $AttendanceRecord->date = today();
        $AttendanceRecord->save();
       
        foreach($request->isPresent as $stdId){
            $allRecords = new AttendanceStore();
            $allRecords->attendance_id = $AttendanceRecord->id;
            $allRecords->admit_student_id  = $stdId;
            $allRecords->save();
        }
        return back();
    }

    public function attendanceRecord(){
        $att = Attendance::with('attendanceStore')->find(5);
        dd($att);
        return view('Admin.Attendance.record');
    }
}