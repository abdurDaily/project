@extends('FrontEnd.layout.app')
@section('frontEnd-layour')

<div class="slider-area">
    <div class="slider-active owl-carousel">
        <div class="single-slider slider-height-2 bg-img align-items-center d-flex slider-overlay2-1 default-overlay" style="background-image:url({{ asset('assets/img/slider/slider-2.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="slider-content slider-content-2 slider-animated-2 text-center">
                            <h1 class="animated">Welcome to Glaxdu</h1>
                            <p class="animated">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                            <div class="slider-btn">
                                <a class="animated default-btn btn-green-color" href="about-us.html">ABOUT US</a>
                                <a class="animated default-btn btn-white-color" href="contact.html">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height-2 align-items-center d-flex bg-img slider-overlay2-2 default-overlay" style="background-image:url(assets/img/slider/slider-3.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="slider-content slider-content-2 slider-animated-2 text-center">
                            <h1 class="animated">Welcome to Glaxdu</h1>
                            <p class="animated">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                            <div class="slider-btn">
                                <a class="animated default-btn btn-green-color" href="about-us.html">ABOUT US</a>
                                <a class="animated default-btn btn-white-color" href="contact.html">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height-2 align-items-center d-flex bg-img slider-overlay2-3 default-overlay" style="background-image:url(assets/img/slider/slider-4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="slider-content slider-content-2 slider-animated-2 text-center">
                            <h1 class="animated">Welcome to Glaxdu</h1>
                            <p class="animated">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                            <div class="slider-btn">
                                <a class="animated default-btn btn-green-color" href="about-us.html">ABOUT US</a>
                                <a class="animated default-btn btn-white-color" href="contact.html">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us pt-130 pb-130">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-1 text-center mb-100">
            <h2>About <span>Us</span></h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br> quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="row align-items-center">
           <div class="col-lg-7 col-md-12">
                <div class="about-img about-img-2 default-overlay mr-70">
                    <img src="{{ asset('assets/img/banner/banner-2.jpg') }}" alt="">
                    <a class="video-btn video-popup" href="https://www.youtube.com/watch?v=sv5hK4crIRc">
                        <img src="{{ asset('assets/img/icon-img/video.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="about-content-2 pr-70">
                    <p>eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut voluptatLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci didunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit.</p>
                    <img src="{{ asset('assets/img/banner/banner-3.jpg') }}" alt="">
                    <div class="signature mt-30">
                        <img src="assets/img/icon-img/signature.png" alt="">
                    </div>
                    <div class="about-btn mt-45">
                        <a class="default-btn" href="about-us.html">ABOUT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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