<?php

use App\Http\Controllers\Backend\Attendance\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/attendance'],function(){
  Route::get('/add-new-batch', [AttendanceController::class, 'addNewBatch'])->name('add.new.batch');
  Route::post('/add-new-batch', [AttendanceController::class, 'insertAddNewBatch'])->name('insert.new.batch');
  Route::get('/admit-student', [AttendanceController::class, 'admitStudent'])->name('admit.student');
  Route::post('/admit-student', [AttendanceController::class, 'admitStudentDatabase'])->name('admit.student.database');
  Route::get('/present-student', [AttendanceController::class, 'presentStudents'])->name('present.students');
  Route::get('/check-student', [AttendanceController::class, 'checkPresent'])->name('check.present');
  Route::post('/submit-attendance', [AttendanceController::class, 'submitAttendance'])->name('present.submit');
  Route::get('/attendance-record', [AttendanceController::class, 'attendanceRecord'])->name('attendance.record');
})->middleware('check');


?>