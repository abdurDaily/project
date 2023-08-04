@extends('FrontEnd.layout.app')
@section('frontEnd-layour')
<div class="course-area bg-img pt-130">
    <div class="container">
        <div class="section-title mb-75 course-mrg-small">
            <h2>Our Honarable <span>Teacher's</span></h2>
            <p>
                Welcome to our university's distinguished faculty page.their innovative teaching methods and commitment to academic excellence create an engaging and enriching learning environment.Join us in exploring the exciting world of Engineering under the guidance of our expart teachers where curiosity knows no bounds and knowledge knows no limits.</p>
        </div>
        <div class="course-slider-active-3">
            @forelse ($allInfoTeachers as $data)
            <div class="single-course">
                <div class="course-img">
                    <a href="course-details.html"><img class="animated" src="{!! asset('storage/teacher/' . $data->image) !!}" alt=""></a>
                    <span>{{ $data->designation }}</span>
                </div>
                <div class="course-content">
                    <h4><a style="cursor: none;" href="#">{{ $data->name }}</a></h4>
                    <p>{!! Str::limit($data->edu_info, 100, '...<strong>see more</strong>') !!}</p>
                    
                </div>
                <div class="course-position-content">
                    <div class="credit-duration-wrap">
                        <div class="sin-credit-duration">
                            <i class="fa fa-diamond"></i>
                            <span>Phone :{{ $data->phone }}</span>
                        </div>
                        <div class="sin-credit-duration">
                            <i class="fa fa-clock-o"></i>
                            <span>Email :{{ $data->email }}</span>
                        </div>
                    </div>
                    <div class="course-btn">
                        <a class="default-btn" href="{{ route('faculty.details',$data->slug) }}">About More</a>
                    </div>
                </div>
            </div>
            @empty
                <h4 class="text-danger">No teacher's data found</h4>
            @endforelse
        </div>
    </div>
</div>
@endsection