@extends('layouts.website.master')

@section('title')
    Contact Us
@endsection

@section('content')
<main class="main" style="margin-top: 10%;">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Company</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('/assets/images/contact-header-bg.jpg')">
            <h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div id="map">
                      <p class="paragraph-text-for-maps bg-dark p-2">
                        <a class="font-weight-bold" id="switch" type="submit" href="javascript:void(0);">
                            Click Here
                        </a> 
                        <span class="text-white">to toggle between the standard "Road Map" & the "Satellite Map".</span>
                      </p>
                      <!-- Makram Ebeid Map (Roadmap) -->
                        <div id="mapouter_roadmap"><div class="gmap_canvas_roadmap"><iframe class="gmap_iframe_roadmap" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=makram ebied&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div></div>
                      <!-- Makram Ebeid Map (Satellite) -->
                        <div id="mapouter_satellite" hidden><div class="gmap_canvas_satellite"><iframe class="gmap_iframe_satellite" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=makram ebied&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div></div>
                    </div>
                </div>
                <style>
                    #map{
                        height: 100%;
                    }

                    .paragraph-text-for-maps{
                        font-size: 100%;
                    }

                    #mapouter_roadmap{ /* Road Map */
                        position:relative;
                        text-align:right;
                        width:100%;
                        height:400px;
                    }
                    .gmap_canvas_roadmap{ /* Road Map */
                        overflow:hidden;
                        background:none!important;
                        width:100%;
                        height:400px;
                    }
                    .gmap_iframe_roadmap{ /* Road Map */
                        height:400px!important;
                    }

                    #mapouter_satellite{ /* Satellite Map */
                        position:relative;
                        text-align:right;
                        width:100%;
                        height:400px;
                    }
                    .gmap_canvas_satellite{ /* Satellite Map */
                        overflow:hidden;
                        background:none!important;
                        width:100%;
                        height:400px;
                    }
                    .gmap_iframe_satellite{ /* Satellite Map */
                        height:400px!important;
                    }
                </style>
                <script>
                    const road_map = document.querySelector("#mapouter_roadmap"),
                    satellite_map = document.querySelector("#mapouter_satellite");

                    document.querySelector("#switch").addEventListener("click", function() {
                        // hide element: element.hidden = true;
                        // show element: element.hidden = false;
                        road_map.hidden = !road_map.hidden;
                        satellite_map.hidden = !satellite_map.hidden;
                    });
                </script>
                <div class="col-lg-6 mb-2 mb-lg-0" id="contact-info-container">
                    <h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                    <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                    <div class="row">

                        <div class="col-sm-7">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-map-marker"></i>
                                        Makram Ebeid, Nasr City, Cairo, Egypt
                                    </li>
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:#">+20 101 011 0457</a>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:#">info@AA.com</a>
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-7 -->

                        <div class="col-sm-5">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-clock-o"></i>
                                        <span class="text-dark">Monday-Saturday</span> <br>11 AM - 7 PM ET
                                    </li>
                                    <li>
                                        <i class="icon-calendar"></i>
                                        <span class="text-dark">Sunday</span> <br>11 AM - 6 PM ET
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-5 -->
                    </div><!-- End .row -->
                </div><!-- End .col-lg-6 -->
                <div class="col-lg-6">
                    <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                    <p class="mb-2">Use the form below to get in touch with our team.</p>
                    <form class="contact-form mb-3" action="{{ route('contact-us.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="cname" placeholder="Name *" value="{{ old('name') }}" required>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label for="cemail" class="sr-only">Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" id="cemail" placeholder="Email *" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cphone" class="sr-only">Phone</label>
                                <input type="text" name="phone" class="form-control" id="cphone" placeholder="Phone">
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label for="csubject" class="sr-only">Subject</label>
                                <input type="text" name="subject" class="form-control" id="csubject" placeholder="Subject">
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label for="cmessage" class="sr-only">Message <span class="text-danger">*</span></label>
                        <input class="form-control" name="message" cols="30" rows="4" id="cmessage" required placeholder="Message *">

                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>SUBMIT</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form><!-- End .contact-form -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <!------------ Start all handled conditions (success/unsuccess) + ValidationExceptions ------------>
            @if(session()->has('contact_unsuccessful_message'))
                <div class="alert alert-danger text-center">
                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-white" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                    <span>{{ session()->get('contact_unsuccessful_message') }}</span>
                </div>
            @elseif(session()->has('contact_successful_message'))
                <div class="alert alert-primary text-center fw-bold">
                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-white" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                    <span>{{ session()->get('contact_successful_message') }}</span>
                    <span href="javascript:void(0);" class="font-weight-bold text-dark">&LeftArrow; Don't forget to copy it!</span>
                </div>
            @endif
            <!------------ End all handled conditions (success/unsuccess) + ValidationExceptions ------------>

            <hr class="mt-4 mb-5">

            <div class="stores mb-4 mb-lg-5">
                <h2 class="title text-center mb-3">Our Stores</h2><!-- End .title text-center mb-2 -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="/assets/images/stores/img-1.jpg" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->
                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">Wall Street Plaza</h3><!-- End .store-title -->
                                        <address>88 Pine St, New York, NY 10005, USA</address>
                                        <div><a href="tel:#">+1 987-876-6543</a></div>

                                        <h4 class="store-subtitle">Store Hours:</h4><!-- End .store-subtitle -->
                                        <div>Monday - Saturday 11am to 7pm</div>
                                        <div>Sunday 11am to 6pm</div>

                                        <a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="/assets/images/stores/img-2.jpg" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->

                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">One New York Plaza</h3><!-- End .store-title -->
                                        <address>88 Pine St, New York, NY 10005, USA</address>
                                        <div><a href="tel:#">+1 987-876-6543</a></div>

                                        <h4 class="store-subtitle">Store Hours:</h4><!-- End .store-subtitle -->
                                        <div>Monday - Friday 9am to 8pm</div>
                                        <div>Saturday - 9am to 2pm</div>
                                        <div>Sunday - Closed</div>

                                        <a href="#" class="btn btn-link" target="_blank"><span>View Map</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .stores -->
        </div><!-- End .container -->
        {{-- <div id="map"></div><!-- End #map --> --}}
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection