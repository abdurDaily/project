@extends('layouts.app')
@section('report-table')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>All Record</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('all.attendance.record') }}" method="GET">
                            @csrf 
        
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="subject_id" class="mt-3">Select a Batch No</label>
                                    <select required name="subject_id" id="subject_id" class="form-control">
                                        <option  value="" selected disabled>Select a batch</option>
                                        @foreach ($subjectId as $subjectData)
                                            <option value="{{ $subjectData->id }}">{{ $subjectData->subject_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                        <div class="text-danger"><strong>{{ $message }}</strong></div>
                                    @enderror
        
        
                                </div>
                                <div class="col-6">
                                    <label for="batch_id" class="mt-3">Select a Batch No</label>
                                    <select required name="batch_id" id="batch_id" class="form-control">
                                        <option  value="" selected disabled>Select a batch</option>
                                        @foreach ($batchId as $batchData)
                                            <option value="{{ $batchData->id }}">{{ $batchData->batch_no }}</option>
                                        @endforeach
                                    </select>
                                    @error('batch_id')
                                        <div class="text-danger"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                        
                            <button class="btn btn-primary w-100 mt-5">Submit</button>
                         </form>


                         <table class="table table-responsive table-hover table-striped">
                            <tr>
                                <td>#</td>
                                <td>Student id</td>
                                <td>Student name</td>
                                <td>Percentage</td>
                            </tr>
                            @if (isset($students))
                                
                          
                            @foreach ($students as $key=>$student)
                                
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $student->std_id }}</td>
                                <td>
                                    {{ $student->std_name }}
                                </td>
                                <td>
                                    {{ round(($student->my_attendence_count / $totalAttendence) * 100) . '%' }}
                                </td>
                            </tr>
                            @endforeach
                            @endif


                         </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection