@extends('layouts.app')
@section('report-table')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                     </div>
                    @endif

                    <div class="card-header" style="background: #041d61;color:#fff;padding:15px 20px;">
                        <h1>Previous Year Question's List </h1>

                        {{-- * SUCCESS MESSAGE * --}}
                        {{-- @if ($message = Session::get('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif --}}

                        @hasSection('success')
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>SN</th>
                                <th>Semester</th>
                                <th>Subject</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>

                            @forelse ($details as $key => $data)
                                <tr>
                                    <td>{{ ++$key; }}</td>
                                    <td>{{ $data->subject_name }}</td>
                                    <td>

                                    {{-- ** BOOTSTRAP ACCORDION FOR PDF ** --}}
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            
                                           
                                                <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $data->id }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                                  Previous Question's
                                                    </button>
                                                </h2>
                                                @forelse ($data->detailsInfo as $detail)
                                                <div id="flush-collapse{{ $data->id }}" style="background: #f2e9e9; padding:5px;" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <a target="_blank" href="{!! asset('storage/Questions/'.$detail->image) !!}"> <strong>Download</strong> <span class="text-danger">{{ $detail->sessions }}</span> <strong>PDF</strong> </a>
                                                    </div>
                                                </div> 
                                                @empty
                                                    <h1 class="text-danger mt-3">Not Upload Yeat!</h1>
                                                @endforelse
   
                                                </div>
   
                                          </div>
                                    </td>
                                    <td>{{ $data->created_at->format('d M, Y') }} </td>
                                  <td>
                                    <div class="btn-group">
                                        <a href="{{ route('question.update',$data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                  </td>
                                </tr>
                            @empty
                                <h1>no record found !</h1>
                            @endforelse

                        </table>
                        <br>
                        {{ $details->links() }}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection


{{--*** PAGINATION *** --}}

@push('pagination')
    <style>
        .pagination .page-item {
            margin: 0 3px;
        }
        .pagination span{
           background: rgb(30, 7, 230) !important;
           color: #fff !important;
        }
    </style>
@endpush

{{-- SEARCHING --}}
@push('search')
<div class="search d-none d-sm-block">
    <form action="{{ route('search.question') }}" method="GET" role="search">
        @csrf
        <input name="search" value="{{ Request::get('search') }}" type="search" class="search__input form-control border-transparent" placeholder="Search...">
        <i data-feather="search" class="search__icon dark-text-gray-300"></i> 
    </form>
</div>
@endpush