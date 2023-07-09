@extends('layouts.app')
@section('report-table')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background: #030a74; color:#fff; padding:15px;">
                        <h1>Attendance Sheet</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('check.present') }}" method="GET">
                                <div class="row">
                                    <div class="col-10">
                                        {{-- <form action="{{ route('check.present') }}" method="GET"> --}}
                                            @csrf 
                                            <select name="batch_id" id="batch_id" class="form-control">
                                              @foreach ($result as $data )
                                                  <option value="{{ $data->id }}">{{ $data->batch_no }}</option>
                                              @endforeach
                                            </select>
                                         {{-- <button class="btn btn-primary">Submit</button> --}}
                                        {{-- </form> --}}
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>


                                
                            </div>
                            <div class="col-md-6">
                                <input name="date" type="date" class="form-control">
                            </div>

                            @if (isset($studentInfo))
                                
                            
                            <form action="{{ route('present.submit') }}" method="POST">
                               @csrf
                               <input name="check_id" type="hidden" value="{{ isset(request()->batch_id) ? request()->batch_id : '' }}">
                               <table class="table table-responsive">
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Std id</th>
                                    <th>Status</th>
                                    {{-- <th>SN</th> --}}
                                </tr>
                                @forelse ($studentInfo as $detail)
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->std_name }}</td>
                                        <td>
                                            {{ $detail->std_id }}
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input name="isPresent[]" class="form-check-input" value=" {{ $detail->std_id }}" type="checkbox" id="flexSwitchCheckDefault">
                                              </div>
                                            
                                        </td>
                                    </tr>
                                @empty       
                                @endforelse
                            </table>

                            <button class="btn btn-primary w-100 mt-5">Submit</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





@push('niceSelect2CSS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('niceSelect2')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
    $('#batch_id').select2();
});

</script>
@endpush