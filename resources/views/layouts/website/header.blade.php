<header class="header header-5 @if(Route::is('login') || Route::is('register')) d-none @endif"
style="
@if(!Route::is('home')) 
    background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)); 
@elseif(Route::is('home')) 
    background: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2));
@endif"
>
    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ route('home') }}" class="logo">
                    <img src="/assets/images/logos/Anywhere-Anytime(2).png" alt="AA Logo" width="110" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="category.html" class="sf-with-ul">Shop</a>
                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="menu-title">Shop with sidebar</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="category-list.html">Shop List</a></li>
                                                        <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                                        <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                                        <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                                        <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li>
                                                    </ul>

                                                    <div class="menu-title">Shop no sidebar</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                                        <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="menu-title">Product Category</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                                        <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                                    </ul>
                                                    <div class="menu-title">Shop Pages</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="dashboard.html">My Account</a></li>
                                                        <li><a href="#">Lookbook</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->

                                    <div class="col-md-4">
                                        <div class="banner banner-overlay">
                                            <a href="category.html" class="banner banner-menu">
                                                <img src="/assets/images/menu/banner-1.jpg" alt="Banner">

                                                <div class="banner-content banner-content-top">
                                                    <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner banner-overlay -->
                                    </div><!-- End .col-md-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>
                        <li>
                            <a href="product.html" class="sf-with-ul">Product</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="menu-col">
                                            <div class="menu-title">Product Details</div><!-- End .menu-title -->
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
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="banner banner-overlay">
                                            <a href="category.html">
                                                <img src="/assets/images/menu/banner-2.jpg" alt="Banner">

                                                <div class="banner-content banner-content-bottom">
                                                    <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-sm -->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="sf-with-ul">Company</a>

                            <ul>
                                <li>
                                    <a href="{{ route('about-us') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact-us') }}">Contact Us</a>
                                </li>
                                <li><a href="faq.html">FAQs</a></li>
                                {{-- <li><a href="{{ route('error-404') }}">Error 404</a></li> --}}
                                <li><a href="{{ route('coming-soon') }}">Coming Soon</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog.html" class="sf-with-ul">Blog</a>

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
                            <a href="elements-list.html" class="sf-with-ul">Elements</a>

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
                        <li>
                            @if(auth()->user())
                                <a href="javascript:void(0);" style="color: rgb(206, 191, 123); display: inline-flex;">
                                    <img src="{{ auth()->user()->avatar ?? '/assets/images/avatars/no-avatar.png' }}" width="40" style="border-radius: 1px;">
                                    <span style="padding: 8px 0px 0px 2px;">{{ auth()->user()->name ?? auth()->user()->username }} ({{ auth()->user()->user_type }})</span>
                                </a>
                                <ul>
                                    <li><a href="javascript:void(0);">Profile Management</a></li>
                                    @if(auth()->user()->user_type == "customer")
                                        <li><a href="javascript:void(0);">My Wishlist (0)</a></li>
                                    @endif
                                    @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                                        <li>
                                            <a href="{{ route('dashboard') }}">Dashboard</a>
                                            <ul>
                                                <li><a href="{{ route('dashboard') }}">Home</a></li>
                                                <li>
                                                    <a href="javascript:void(0);">Products</a>
                                                    <ul>
                                                        <li><a href="javascript:void(0);" style="color:black; user-select:none; cursor:default;"><u>Product Gender</u></a></li>
                                                        <li><a href="javascript:void(0);">Men</a></li>
                                                        <li><a href="javascript:void(0);">Women</a></li>
                                                        <li><a href="javascript:void(0);">Kids</a></li>
                                                        <hr>
                                                        <li><a href="javascript:void(0);" style="color:black; user-select:none; cursor:default;"><u>Product Category</u></a></li>
                                                        <li><a href="javascript:void(0);">Formal</a></li>
                                                        <li><a href="javascript:void(0);">Casual</a></li>
                                                        <li><a href="javascript:void(0);">Sports Wear</a></li>
                                                        <hr>
                                                        <li><a href="javascript:void(0);" style="color:black; user-select:none; cursor:default;"><u>Product Discounts</u></a></li>
                                                        <li><a href="javascript:void(0);">Products with discounts</a></li>
                                                        <li><a href="javascript:void(0);">Products without discounts</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">Users</a>
                                                    <ul>
                                                        <li><a href="javascript:void(0);">All Users</a></li>
                                                        <li><a href="javascript:void(0);">Admins</a></li>
                                                        <li><a href="javascript:void(0);">Moderators</a></li>
                                                        <li><a href="javascript:void(0);">Suppliers</a></li>
                                                        <li><a href="javascript:void(0);">Customers</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:void(0);">Carts</a></li>
                                            </ul>
                                        </li>
                                    @elseif(auth()->user()->user_type == "supplier")
                                        <li>
                                            <a href="{{ route('dashboard') }}">Dashboard</a>
                                            <ul>
                                                <li><a href="{{ route('dashboard') }}">Home</a></li>
                                                <li><a href="{{ route('products_details.index') }}">My Products</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            @elseif(!auth()->user())
                                <span style="padding-left: 15px; color: #9cb0c2;">{{ 'guest_'.substr(uniqid(),8,13) }}</span>
                                <li>
                                    <a href="javascript:void(0);" style="color: rgb(206, 191, 123);">Account</a>
                                    <ul>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    </ul>
                                </li>
                            @endif
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div id="account-mobile-overlay">
                    {{-- <ul>
                        <li>
                            <a href="javascript:void(0);" style="color: rgb(206, 191, 123);">{{ auth()->user()->name ?? auth()->user()->username }} ({{ ucfirst(auth()->user()->user_type) }})</a>
                            <ul>
                                <li><a href="javascript:void(0);">xxx</a></li>
                                <li><a href="javascript:void(0);">yyy</a></li>
                                <li><a href="javascript:void(0);">zzz</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                    @if(auth()->user())
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgb(206, 191, 123); cursor: pointer;">
                                {{ auth()->user()->name ?? auth()->user()->username }} ({{ ucfirst(auth()->user()->user_type) }})
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" onMouseOver="this.style.color='#CC9966'" onMouseOut="this.style.color='inherit'">Profile Management</a>
                                @if(auth()->user()->user_type == "customer")
                                    <a class="dropdown-item" href="javascript:void(0);" onMouseOver="this.style.color='#CC9966'" onMouseOut="this.style.color='inherit'">My Wishlist (0)</a>
                                @endif
                                @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                                    <a class="dropdown-item" href="javascript:void(0);" onMouseOver="this.style.color='#CC9966'" onMouseOut="this.style.color='inherit'">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.querySelector('#logout-form').submit();" onMouseOver="this.style.color='#CC9966'" onMouseOut="this.style.color='inherit'">Logout</a>                            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @elseif(!auth()->user())
                        <div style="display: inline-flex;">
                            <span style="color: #9cb0c2; padding-right:16px;">{{ 'guest_'.substr(uniqid(),8,13) }}</span>
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgb(206, 191, 123); cursor: pointer;">Account</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('login') }}" onMouseOver="this.style.color='#CC9966'" onMouseOut="this.style.color='inherit'">Login</a>
                                    <a class="dropdown-item" href="{{ route('register') }}" onMouseOver="this.style.color='#CC9966'" onMouseOut="this.style.color='inherit'">Register</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="header-search header-search-extended header-search-visible">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="GET">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search for items or brands...">
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
                
                <a href="wishlist.html" class="wishlist-link">
                    <i class="icon-heart-o"></i>
                </a>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">Beige knitted elastic runner shoes</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">1</span>
                                        x $84.00
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="/assets/images/products/cart/product-1.jpg" alt="product">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div><!-- End .product -->

                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">Blue utility pinafore denim dress</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">1</span>
                                        x $76.00
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="/assets/images/products/cart/product-2.jpg" alt="product">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div><!-- End .product -->
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price">$160.00</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="cart.html" class="btn btn-primary">View Cart</a>
                            <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-middle -->
    @include('layouts.website.register-now')
</header><!-- End .header -->
