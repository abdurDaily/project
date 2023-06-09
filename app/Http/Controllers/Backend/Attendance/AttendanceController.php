<?php

namespace App\Http\Controllers\Backend\Attendance;

use App\Http\Controllers\Controller;
use App\Models\AdmitStudent;
use App\Models\Attendance;
use App\Models\AttendanceStore;
use App\Models\Batch_number;
use App\Models\Subject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

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
        $subjectId = Subject::all();
        //dd($subjectId);
        return view('Admin.Attendance.present',compact('result','subjectId'));
    }


    public function checkPresent(Request $request){
        $result = Batch_number::all();
        $subjectId = Subject::all();
        $studentInfo = AdmitStudent::where('batch_number',$request->batch_id)->get();
        return view('Admin.Attendance.present',compact('studentInfo','result','subjectId'));
    }


    public function submitAttendance(Request $request){
        //dd($request->all());
        $AttendanceRecord = new Attendance();
        $AttendanceRecord->batch_number_id = $request->check_id;
        $AttendanceRecord->date = $request->date;
        $AttendanceRecord->subject_id = $request->subject_id;
        $AttendanceRecord->save();
       
        foreach($request->isPresent as $stdId){
            $allRecords = new AttendanceStore();
            $allRecords->attendance_id = $AttendanceRecord->id;
            $allRecords->admit_student_id  = $stdId;
            $allRecords->save();
        }
        return back();
    }

    public function attendanceRecord(Request $request){
        $subjectId = Subject::all();
        $batchId = Batch_number::all();
        $subjectId = Subject::all();
        $batchId = Batch_number::all();

        
        $query = Attendance::query();
        if($request->subject_id){
            $query->where('subject_id',$request->subject_id);    
        }
        if($request->date){
            $query->where('date',$request->date);
        }
        if($request->batch_id){
            $query->where('batch_number_id',$request->batch_id);
        }

        $students = AdmitStudent::where('batch_number', $request->batch_id)->get();
        $atteances = $query->with('attendanceStore')->first();
        $attendedStudetID = $atteances->attendanceStore->pluck('admit_student_id')->toArray();
        return view('Admin.Attendance.record', compact('subjectId','batchId','students','attendedStudetID'));
    }


    public function attendanceRecordCheck(Request $request){
        $subjectId = Subject::all();
        $batchId = Batch_number::all();

        
        $query = Attendance::query();
            if($request->subject_id){
                $query->where('subject_id',$request->subject_id);    
            }
            if($request->date){
                $query->where('date',$request->date);
            }
            if($request->batch_id){
                $query->where('batch_number_id',$request->batch_id);
            }

        $students = AdmitStudent::where('batch_number', $request->batch_id)->get();
        $atteances = $query->with('attendanceStore')->first();
        $attendedStudetID = $atteances->attendanceStore->pluck('admit_student_id')->toArray();
        return view('Admin.Attendance.record',compact('atteances','students','attendedStudetID','subjectId','batchId'));
    }
}