@extends('layouts.website.master')

@section('title')
    Home
@endsection

@section('content')
<div class="page-wrapper">
    <main class="main">
        <div class="intro-slider-container">
            <div class="intro-slider owl-carousel owl-simple owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav":false, "dots": false, "loop": false}'>
                <div class="intro-slide" style="background-image: url(/assets/images/demos/demo-15/slider/slide-1.jpg);">
                    <div class="container intro-content text-center">
                        <h3 class="intro-subtitle">Want to know what's hot?</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title text-white">Checkout The Latest Looks!</h1><!-- End .intro-title -->
                        <a href="#scroll-to-content" class="btn btn-outline-primary-2 scroll-to">
                            <span>Start scrolling</span>
                            <i class="icon-long-arrow-down"></i>
                        </a>
                    </div><!-- End .intro-content -->
                </div><!-- End .intro-slide -->
            </div><!-- End .intro-slider owl-carousel owl-simple -->

            <span class="slider-loader text-white"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->
        
        <div class="display-row" id="scroll-to-content">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-last">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="/assets/images/demos/demo-15/banners/banner-1.jpg" alt="Banner">
                            </a>

                            <div class="banner-content men">
                                <h2 class="banner-title text-white">01. Get your <br>inspiration <br>in the street.</h2><!-- End .banner-title -->
                                <h3 class="banner-subtitle text-brightblack">IN THIS LOOK</h3><!-- End .banner-subtitle -->

                                <ul class="text-white">
                                    <li>Moto Jacket</li>
                                    <li>Henry Backpack</li>
                                </ul>

                                <div class="banner-text text-brightblack">$98.00 - $1,298.00</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-primary-2"><span>Buy All</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="heading text-center">
                            <h2 class="title">About This Look</h2><!-- End .title text-center -->
                            <p class="title-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p><!-- End .title-desc -->
                        </div><!-- End .heading -->

                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product product-4">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/demos/demo-15/products/product-1.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="product.html">Suede Moto Jacket</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="new-price">Now $1,298.00</span>
                                                    <span class="old-price">Was $1,400.00</span>
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-6">
                                        <div class="product product-4">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/demos/demo-15/products/product-2.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="product.html">Henry Leather Backpack</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    $448.00
                                                </div><!-- End .product-price -->

                                                <div class="product-nav product-nav-dots">
                                                    <a href="#" class="active" style="background: #917f4d;"><span class="sr-only">Color name</span></a>
                                                    <a href="#" style="background: #c55858;"><span class="sr-only">Color name</span></a>
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-8 offset-lg-2 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .display-row -->

        <div class="display-row" style="background-color: #f2f2f2;">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner banner-light banner-overlay">
                            <a href="#">
                                <img src="/assets/images/demos/demo-15/banners/banner-2.jpg" alt="Banner">
                            </a>

                            <div class="banner-content women">
                                <h2 class="banner-title">02. Dresses for <br>every spring day.</h2><!-- End .banner-title -->
                                <h3 class="banner-subtitle text-darkblack">IN THIS LOOK</h3><!-- End .banner-subtitle -->

                                <ul>
                                    <li>Light grey linen shirt dress</li>
                                    <li>Gold colour earrings</li>
                                    <li>Brown heel mules</li>
                                </ul>

                                <div class="banner-text text-darkblack">$20.00 - $96.00</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-primary-2"><span>Buy All</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="heading text-center">
                            <h2 class="title">About This Look</h2><!-- End .title text-center -->
                            <p class="title-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p><!-- End .title-desc -->
                        </div><!-- End .heading -->

                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="product product-4">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="/assets/images/demos/demo-15/products/product-3.jpg" alt="Product image" class="product-image">
                                            <img src="/assets/images/demos/demo-15/products/product-3-2.jpg" alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Light grey linen shirt dress</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $92.00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->

                            <div class="col-6 col-md-4">
                                <div class="product product-4">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="/assets/images/demos/demo-15/products/product-4.jpg" alt="Product image" class="product-image">
                                            <img src="/assets/images/demos/demo-15/products/product-4-2.jpg" alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Gold colour textured doorknocker earrings</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $20.00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->

                            <div class="col-6 col-md-4">
                                <div class="product product-4">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="/assets/images/demos/demo-15/products/product-5.jpg" alt="Product image" class="product-image">
                                            <img src="/assets/images/demos/demo-15/products/product-5-2.jpg" alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Gold colour textured doorknocker</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $96.00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #99523e;"><span class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .display-row .bg-light -->

        <div class="video-banner video-banner-bg video-fullheight bg-image text-center" style="background-image: url(/assets/images/demos/demo-15/bg-1.jpg)">
            <div class="container">
                <h3 class="video-banner-title h1 text-white"><span>Spring / Summer</span>The New Romantic Collection 2019</h3><!-- End .video-banner-title -->
                <a href="https://www.youtube.com/watch?v=vBPgmASQ1A0" class="btn-video btn-iframe"><i class="icon-play"></i></a>
            </div><!-- End .container -->
        </div><!-- End .video-banner bg-image -->

        <div class="display-row bg-light">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-last">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="/assets/images/demos/demo-15/banners/banner-3.jpg" alt="Banner">
                            </a>

                            <div class="banner-content men">
                                <h2 class="banner-title text-white">03. Beautiful <br>dresses perfect <br>for any occasion.</h2><!-- End .banner-title -->
                                <h3 class="banner-subtitle text-brightblack">IN THIS LOOK</h3><!-- End .banner-subtitle -->

                                <ul class="text-white">
                                    <li>Botanical-Print Dress</li>
                                    <li>Cece Shoulder Bag</li>
                                    <li>Cunningham Leather Sandal</li>
                                </ul>

                                <div class="banner-text text-brightblack">$130.00 - $358.00</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-primary-2"><span>Buy All</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="heading text-center">
                            <h2 class="title">About This Look</h2><!-- End .title text-center -->
                            <p class="title-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p><!-- End .title-desc -->
                        </div><!-- End .heading -->

                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="product product-4">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="/assets/images/demos/demo-15/products/product-6.jpg" alt="Product image" class="product-image">
                                            <img src="/assets/images/demos/demo-15/products/product-6-2.jpg" alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Botanical-Print Crepe Dress</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $165.00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->

                            <div class="col-6 col-md-4">
                                <div class="product product-4">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="/assets/images/demos/demo-15/products/product-7.jpg" alt="Product image" class="product-image">
                                            <img src="/assets/images/demos/demo-15/products/product-7-2.jpg" alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Cunningham Leather Sandal</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $130.00
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->

                            <div class="col-6 col-md-4">
                                <div class="product product-4">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="/assets/images/demos/demo-15/products/product-8.jpg" alt="Product image" class="product-image">
                                            <img src="/assets/images/demos/demo-15/products/product-8-2.jpg" alt="Product image" class="product-image-hover">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="product.html">Cece Medium Leather Shoulder Bag</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $358.00
                                        </div><!-- End .product-price -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #333;"><span class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #c55858;"><span class="sr-only">Color name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .display-row .bg-light -->

        <div class="display-row">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner banner-light banner-overlay">
                            <a href="#">
                                <img src="/assets/images/demos/demo-15/banners/banner-4.jpg" alt="Banner">
                            </a>

                            <div class="banner-content women">
                                <h2 class="banner-title">04. Complete your <br>look with the latest <br>accessories.</h2><!-- End .banner-title -->
                                <h3 class="banner-subtitle text-darkblack">IN THIS LOOK</h3><!-- End .banner-subtitle -->

                                <ul>
                                    <li>Black mini boxy cross body bag</li>
                                    <li>Black zebra print leather heel mules</li>
                                </ul>

                                <div class="banner-text text-darkblack">$36.00 - $120.00</div><!-- End .banner-text -->
                                <a href="#" class="btn btn-outline-primary-2"><span>Buy All</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="heading text-center">
                            <h2 class="title">About This Look</h2><!-- End .title text-center -->
                            <p class="title-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p><!-- End .title-desc -->
                        </div><!-- End .heading -->

                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product product-4">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/demos/demo-15/products/product-9.jpg" alt="Product image" class="product-image">
                                                    <img src="/assets/images/demos/demo-15/products/product-9-2.jpg" alt="Product image" class="product-image-hover">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="product.html">Black zebra print leather heel mules</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    $120.00
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-6">
                                        <div class="product product-4">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="/assets/images/demos/demo-15/products/product-10.jpg" alt="Product image" class="product-image">
                                                    <img src="/assets/images/demos/demo-15/products/product-10-2.jpg" alt="Product image" class="product-image-hover">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action -->

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="product.html">Black mini boxy cross body bag</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    $36.00
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-8 offset-lg-2 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .display-row -->

        <div class="mb-2"></div><!-- End .mb-2 -->

        <div class="container-fluid">
            <div class="cta cta-separator">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-wrapper cta-text text-center">
                            <h3 class="cta-title">Shop Social</h3><!-- End .cta-title -->
                            <p class="cta-desc">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p><!-- End .cta-desc -->
                    
                            <div class="social-icons social-icons-colored justify-content-center">
                                <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div><!-- End .soial-icons -->
                        </div><!-- End .cta-wrapper -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="cta-wrapper text-center">
                            <h3 class="cta-title mb-2">Our Costumers Say</h3><!-- End .cta-title -->

                            <div class="owl-carousel owl-simple owl-testimonials" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": true,
                                    "responsive": {
                                        "1500": {
                                            "nav": true
                                        }
                                    }
                                }'>
                                <blockquote class="testimonial testimonial-icon text-center">
                                    <p>“ Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. ”</p>

                                    <cite>
                                        Charly Smith,
                                        <span>Customer</span>
                                    </cite>
                                </blockquote><!-- End .testimonial -->

                                <blockquote class="testimonial testimonial-icon text-center">
                                    <p>“ Impedit, ratione sequi, sunt incidunt magnam et. Delectus obcaecati optio eius error libero perferendis nesciunt atque. ”</p>

                                    <cite>
                                        Damon Stone
                                        <span>Customer</span>
                                    </cite>
                                </blockquote><!-- End .testimonial -->

                                <blockquote class="testimonial testimonial-icon text-center">
                                    <p>“ Perferendis perspiciatis, voluptate, distinctio earum veritatis animi tempora eget blandit nunc tortor eu nibh. ”</p>

                                    <cite>
                                        John Smith
                                        <span>Customer</span>
                                    </cite>
                                </blockquote><!-- End .testimonial -->
                            </div><!-- End .testimonials-slider owl-carousel -->
                        </div><!-- End .cta-wrapper -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .cta -->
        </div><!-- End .container-fluid -->

        <div class="mb-7"></div><!-- End .mb-7 -->

        <div class="blog-posts mb-9">
            <div class="container-fluid">
                <div class="heading text-center">
                    <h2 class="title">From Our Blog</h2><!-- End .title text-center -->
                    <p class="title-desc">Donec odio. Quisque volutpat mattis eros. <br>Nullam malesuada erat</p><!-- End .title-desc -->
                </div><!-- End .heading -->

                <div class="owl-carousel owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "items": 3,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":1
                            },
                            "520": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            }
                        }
                    }'>
                    <article class="entry">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/demos/demo-15/blog/post-1.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">Nov 22, 2018</a>, 1 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Formal</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/demos/demo-15/blog/post-2.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 12, 2018</a>, 0 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Casual</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urnanib ... </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/demos/demo-15/blog/post-3.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 19, 2018</a>, 2 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Sports Wear</a></a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Quisque volutpat mattis eros. Nullam malesuada eratut turpis. Suspendisse urna nibh, viverra non ...</p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="/assets/images/demos/demo-15/blog/post-4.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 25, 2018</a>, 3 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">xxxx</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Nullam malesuada eratut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .owl-carousel -->
            </div><!-- End .container-fluid -->
        </div><!-- End .blog-posts -->
    </main><!-- End .main -->
</div><!-- End .page-wrapper -->

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>
        
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="category.html">Shop</a>
                    <ul>
                        <li><a href="category-list.html">Shop List</a></li>
                        <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                        <li><a href="category.html">Shop Grid 3 Columns</a></li>
                        <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                        <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                        <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                        <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                        <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="#">Lookbook</a></li>
                    </ul>
                </li>
                <li>
                    <a href="product.html" class="sf-with-ul">Product</a>
                    <ul>
                        <li><a href="product.html">Default</a></li>
                        <li><a href="product-centered.html">Centered</a></li>
                        <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                        <li><a href="product-gallery.html">Gallery</a></li>
                        <li><a href="product-sticky.html">Sticky Info</a></li>
                        <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                        <li><a href="product-fullwidth.html">Full Width</a></li>
                        <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <ul>
                        <li>
                            <a href="about.html">About</a>

                            <ul>
                                <li><a href="about.html">About 01</a></li>
                                <li><a href="about-2.html">About 02</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>

                            <ul>
                                <li><a href="contact.html">Contact 01</a></li>
                                <li><a href="contact-2.html">Contact 02</a></li>
                            </ul>
                        </li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="faq.html">FAQs</a></li>
                        <li><a href="404.html">Error 404</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                    </ul>
                </li>
                <li>
                    <a href="blog.html">Blog</a>

                    <ul>
                        <li><a href="blog.html">Classic</a></li>
                        <li><a href="blog-listing.html">Listing</a></li>
                        <li>
                            <a href="#">Grid</a>
                            <ul>
                                <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Masonry</a>
                            <ul>
                                <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Mask</a>
                            <ul>
                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Single Post</a>
                            <ul>
                                <li><a href="single.html">Default with sidebar</a></li>
                                <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="elements-list.html">Elements</a>
                    <ul>
                        <li><a href="elements-products.html">Products</a></li>
                        <li><a href="elements-typography.html">Typography</a></li>
                        <li><a href="elements-titles.html">Titles</a></li>
                        <li><a href="elements-banners.html">Banners</a></li>
                        <li><a href="elements-product-category.html">Product Category</a></li>
                        <li><a href="elements-video-banners.html">Video Banners</a></li>
                        <li><a href="elements-buttons.html">Buttons</a></li>
                        <li><a href="elements-accordions.html">Accordions</a></li>
                        <li><a href="elements-tabs.html">Tabs</a></li>
                        <li><a href="elements-testimonials.html">Testimonials</a></li>
                        <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                        <li><a href="elements-portfolio.html">Portfolio</a></li>
                        <li><a href="elements-cta.html">Call to Action</a></li>
                        <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                    </ul>
                </li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

{{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                    <div class="banner-content text-center">
                        <img src="/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                        <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                        <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                        <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><span>go</span></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                            <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                        </div><!-- End .custom-checkbox -->
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection