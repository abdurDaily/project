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
                    <a href="{{ route('faculty.details',$data->slug) }}"><img class="animated" src="{{ $data->image }}" alt=""></a>
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









<div class="event-area pt-130 pb-130">
    <div class="container">
        <div class="row">
            @forelse ($blogDetails as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="single-event mb-55 event-gray-bg">
                        <div class="event-img">
                            <a href="{{ route('singleBlog.details',$data->slug) }}"><img src="{{ $data->image }}" alt=""></a>
                            <div class="event-date-wrap">
                                <span class="event-date">{{ $data->created_at->format('d') }}</span>
                                <span>{{ $data->created_at->format('M') }}</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h3><a href="event-details.html">{{ Str::limit($data->title,40) }}</a></h3>
                            <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                            <div class="event-meta-wrap">
                                <div class="event-meta">
                                    <i class="fa fa-location-arrow"></i>
                                    <span>{{ $data->CategoryBlog->title }}</span>
                                </div>
                                <div class="event-meta">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{ $data->created_at->format('h,I,s') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h4>No event post found</h4>
            @endforelse
        </div>
        <div class="pro-pagination-style text-center mt-25">
            <ul>
                <li>
                    {{ $blogDetails->links() }}
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

