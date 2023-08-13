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
                    <a href="course-details.html"><img class="animated" src="{{ $data->image }}" alt=""></a>
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
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">
                        <a href="event-details.html"><img src="assets/img/event/event-5.jpg" alt=""></a>
                        <div class="event-date-wrap">
                            <span class="event-date">1st</span>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="event-details.html">Global Conference on Business.</a></h3>
                        <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>Mascot Plaza ,Uttara</span>
                            </div>
                            <div class="event-meta">
                                <i class="fa fa-clock-o"></i>
                                <span>05:30 am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">
                        <a href="event-details.html"><img src="assets/img/event/event-6.jpg" alt=""></a>
                        <div class="event-date-wrap">
                            <span class="event-date">2nd</span>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="event-details.html">Academic Conference Maui.</a></h3>
                        <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>Shuvastu ,Badda</span>
                            </div>
                            <div class="event-meta">
                                <i class="fa fa-clock-o"></i>
                                <span>07:20 am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">
                        <a href="event-details.html"><img src="assets/img/event/event-7.jpg" alt=""></a>
                        <div class="event-date-wrap">
                            <span class="event-date">3rd</span>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="event-details.html">Social Sciences & Education.</a></h3>
                        <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>Banashree ,Rampura</span>
                            </div>
                            <div class="event-meta">
                                <i class="fa fa-clock-o"></i>
                                <span>10:18 am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">
                        <a href="event-details.html"><img src="assets/img/event/event-8.jpg" alt=""></a>
                        <div class="event-date-wrap">
                            <span class="event-date">3rd</span>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="event-details.html">Aempor incididunt ut labore ejam.</a></h3>
                        <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>New Market ,Uttara</span>
                            </div>
                            <div class="event-meta">
                                <i class="fa fa-clock-o"></i>
                                <span>09:15 am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">
                        <a href="event-details.html"><img src="assets/img/event/event-9.jpg" alt=""></a>
                        <div class="event-date-wrap">
                            <span class="event-date">1st</span>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="event-details.html">Arts Humanities Social Sciences</a></h3>
                        <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>Mascot Plaza ,Uttara</span>
                            </div>
                            <div class="event-meta">
                                <i class="fa fa-clock-o"></i>
                                <span>10:00 am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">
                        <a href="event-details.html"><img src="assets/img/event/event-10.jpg" alt=""></a>
                        <div class="event-date-wrap">
                            <span class="event-date">2nd</span>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="event-details.html">International Schools Services.</a></h3>
                        <p>Pvolupttem accusantium doloremque laudantium, totam erspiciatis unde omnis iste natus error .</p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>Notun Bazar ,Badda</span>
                            </div>
                            <div class="event-meta">
                                <i class="fa fa-clock-o"></i>
                                <span>11:45 am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pro-pagination-style text-center mt-25">
            <ul>
                <li><a class="prev" href="event.html#"><i class="fa fa-angle-double-left"></i></a></li>
                <li><a class="active" href="event.html#">1</a></li>
                <li><a href="event.html#">2</a></li>
                <li><a class="next" href="event.html#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

