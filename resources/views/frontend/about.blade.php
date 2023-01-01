@extends('layouts.front')

@section('title', 'About Us')

@section('content')



    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>{{ $static->heading_title }}</h1>
                        <p class="mb-4">D{{ $static->heading_desc }}</p>
                        <p><a href="" class="btn btn-secondary me-2">{{ $static->heading_btn_1 }}</a><a href="#" class="btn btn-white-outline">{{ $static->heading_btn_1 }}</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset("frontend/images/couch.png") }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit
                        imperdiet dolor tempor tristique.</p>
                    <div class="row my-5">
                        @foreach($features as $item)
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="{{ asset("assets/uploads/features/" . $item->image)}}" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>{{ $item->title }}</h3>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset("frontend/images/why-choose-us-img.jpg") }}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start Team Section -->
    @if($team->count() > 0)
    <div class="untree_co-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center">
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-around">
                <!-- Start Column 1 -->
                @foreach($team as $member)
                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                    <img src="{{ asset("assets/uploads/team/" . $member->image) }}" class="img-fluid mb-5" alt="team member">
                    <h3><a href="#"><span class="">{{ $member->name }}</span></a></h3>
                    <span class="d-block position mb-4">{{ $member->title }}</span>
                    <p>{{ \Illuminate\Support\Str::limit($member->description, 150, $end='...') }}</p>
                    <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
                </div>
                @endforeach
                <!-- End Column 1 -->
            </div>
        </div>
    </div>
    @endif
    <!-- End Team Section -->



    <!-- Start Testimonial Slider -->
    @if($testimonials->count() > 0)
    <div class="testimonial-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Testimonials</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">
                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                        </div>
                        <div class="testimonial-slider">
                            <!-- Start Item -->
                            @foreach($testimonials as $item)
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;{{$item->description}}&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset("assets/uploads/testimonials/" . $item->image) }}" alt="{{$item->name}}" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">{{$item->name}}</h3>
                                                <span class="position d-block mb-3">{{$item->title}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- END item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- End Testimonial Slider -->


@endsection
