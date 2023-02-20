@extends('layouts.dashboard.master')

@section('title')
  Dashboard Home
@endsection
<style>
  .ancor-underline-color{
    text-decoration-color: black;
  }
</style>

@section('content')          
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
          <div class="d-flex align-items-end flex-wrap">
            <div class="me-md-3 me-xl-5">
              <h2>Welcome back <span class="text-primary">{{ auth()->user()->name ?? auth()->user()->username }}</span>,</h2>
              <h6 class="text-secondary mb-3">Last login at: {{ date('(D) d-m-Y h:m A', strtotime(auth()->user()->last_login_at)) }}</h6>
              {{-- <p class="mb-md-0">Your analytics page.</p> --}}
              <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <i class="mdi mdi-home text-muted"></i>
                <span class="text-muted">
                  @if(auth()->user()->user_type == 'admin') 
                    Admin
                  @elseif(auth()->user()->user_type == 'moderator')
                    Moderator
                  @else
                    Supplier 
                  @endif 
                  Dashboard
                </span>
              </a>
              /
              <span class="text-primary">Analytics</span>
            </div>
            {{-- <div class="d-flex">
              <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <i class="mdi mdi-home text-muted"></i>
                <span class="text-muted mb-0">
                  @if(auth()->user()->user_type == 'admin') 
                    Admin
                  @elseif(auth()->user()->user_type == 'moderator')
                    Moderator
                  @else
                    Supplier 
                  @endif 
                  Dashboard&nbsp;/&nbsp;
                </span>
              </a>
              <p class="text-primary mb-0">Analytics</p>
            </div> --}}
          </div>
          <div class="d-flex justify-content-between align-items-end flex-wrap">
            <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
              <i class="mdi mdi-download text-muted"></i>
            </button>
            <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
              <i class="mdi mdi-clock-outline text-muted"></i>
            </button>
            <button class="btn btn-primary text-light mt-2 mt-xl-0">Generate report</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body dashboard-tabs p-0">
            <ul class="nav nav-tabs px-4" role="tablist">
              @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                <li class="nav-item">
                  <a class="nav-link active" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-us-tab" data-bs-toggle="tab" href="#contact-us" role="tab" aria-controls="contact-us" aria-selected="false">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="categories-tab" data-bs-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="subcategories-tab" data-bs-toggle="tab" href="#subcategories" role="tab" aria-controls="subcategories" aria-selected="false">Sub-categories</a>
                </li>
              @endif
              <li class="nav-item">
                <a class="nav-link {{ auth()->user()->user_type == "supplier" ? 'active' : '' }}" id="products-details-tab" data-bs-toggle="tab" href="#products-details" role="tab" aria-controls="products-details" aria-selected="{{ auth()->user()->user_type == "supplier" ? 'true' : 'false' }}">
                  {{ auth()->user()->user_type == "supplier" ? 'My Products Details' : 'Products Details' }}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="final-products-tab" data-bs-toggle="tab" href="#final-products" role="tab" aria-controls="final-products" aria-selected="false">
                  {{ auth()->user()->user_type == "supplier" ? 'My Final Products' : 'Final Products' }}
                </a>
              </li>
            </ul>
            <div class="tab-content py-0 px-0">
              @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account-multiple-outline icon-lg me-3 text-primary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">All Users</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::all()->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account-key me-3 icon-lg text-dark"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Admins</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::type('admin')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account-star me-3 icon-lg text-success"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Moderators</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::type('moderator')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account me-3 icon-lg text-info"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Customers</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::type('customer')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account-card-details me-3 icon-lg text-secondary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Suppliers</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::type('supplier')->count() }})</h5>
                      </div>
                    </div>


                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account me-3 icon-lg text-success"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Active Users</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::where('status', 'active')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account me-3 icon-lg text-warning"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Inactive Users</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::where('status', 'inactive')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-flex border-md-right flex-grow-2 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account me-3 icon-lg text-danger"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <small class="mb-1 text-muted">Blocked Users</small>
                        <h5 class="me-2 mb-0">({{ \App\Models\User::where('status', 'blocked')->count() }})</h5>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="tab-pane fade" id="contact-us" role="tabpanel" aria-labelledby="contact-us-tab">
                  {{-- <li class="nav-item"><a class="nav-link" href="{{ route('contact-us.index') }}">All Contact Us Info ({{ \App\Models\ContactUs::all()->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('registered-users-contact-us-info') }}">Registered Users ({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('customers-contact-us-info') }}">Customers Users ({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'customer')->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('suppliers-contact-us-info') }}">Suppliers Users ({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'supplier')->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('unregistered-users-contact-us-info') }}">Unregistered Users ({{ \App\Models\ContactUs::whereNull('create_user_id')->whereNull('user_type')->count() }})</a></li> --}}
                  <div class="d-flex flex-wrap justify-content-xl-between">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-contact-mail icon-lg me-3 text-secondary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <a href="{{ route('contact-us.index') }}" class="ancor-underline-color">
                          <small class="mb-1 text-muted">All Contact Us Info</small>
                        </a>
                        <h5 class="me-2 mb-0">({{ \App\Models\ContactUs::all()->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account-check icon-lg me-3 text-primary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <a href="{{ route('registered-users-contact-us-info') }}" class="ancor-underline-color">
                          <small class="mb-1 text-muted">Registered Users</small>
                        </a>
                        <h5 class="me-2 mb-0">({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account icon-lg me-3 text-warning"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <a href="{{ route('customers-contact-us-info') }}" class="ancor-underline-color">
                          <small class="mb-1 text-muted">Customers</small>
                        </a>
                        <h5 class="me-2 mb-0">({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'customer')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account-card-details icon-lg me-3 text-info"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <a href="{{ route('suppliers-contact-us-info') }}" class="ancor-underline-color">
                          <small class="mb-1 text-muted">Suppliers</small>
                        </a>
                        <h5 class="me-2 mb-0">({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'supplier')->count() }})</h5>
                      </div>
                    </div>
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-account-remove icon-lg me-3 text-danger"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <a href="{{ route('unregistered-users-contact-us-info') }}" class="ancor-underline-color">
                          <small class="mb-1 text-muted">Unregistered Users<br>(Guests/Uknowns)</small>
                        </a>
                        <h5 class="me-2 mb-0">({{ \App\Models\ContactUs::whereNull('create_user_id')->whereNull('user_type')->count() }})</h5>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-view-grid icon-lg me-3 text-primary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <a href="{{ route('categories.index') }}" class="ancor-underline-color">
                          <small class="mb-1 text-muted">Categories</small>
                        </a>
                        <h5 class="me-2 mb-0">({{ \App\Models\Category::all()->count() }})</h5>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="subcategories" role="tabpanel" aria-labelledby="subcategories-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                    <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                      <i class="mdi mdi-view-quilt icon-lg me-3 text-primary"></i>
                      <div class="d-flex flex-column justify-content-around">
                        <a href="{{ route('subcategories.index') }}" class="ancor-underline-color">
                          <small class="mb-1 text-muted">Sub-categories</small>
                        </a>
                        <h5 class="me-2 mb-0">({{ \App\Models\SubCategory::all()->count() }})</h5>
                      </div>
                    </div>
                  </div>
                </div>
              @endif

              <div class="tab-pane fade {{ auth()->user()->user_type == "supplier" ? 'show active' : '' }}" id="products-details" role="tabpanel" aria-labelledby="products-details-tab">
                <div class="d-flex flex-wrap justify-content-xl-between">
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-format-list-bulleted-type icon-lg me-3 text-primary"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <a href="{{ route('all-products.index') }}" class="ancor-underline-color">
                        <small class="mb-1 text-muted">{{ auth()->user()->user_type == "supplier" ? 'All My Products Details' : 'All Products Details' }}</small>
                      </a>
                      <h5 class="me-2 mb-0">
                        @if(auth()->user()->user_type == "supplier")
                          ({{ \App\Models\ProductDetail::where('supplier_id', auth()->user()->id)->count() }})
                        @else 
                          ({{ \App\Models\ProductDetail::all()->count() }})
                        @endif
                      </h5>
                    </div>
                  </div>
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <div class="d-flex flex-column justify-content-around">
                      <h5 class="me-2 mb-0">
                        <h1>
                          {{-- &RightArrow; --}}
                          &equals;
                        </h1>
                      </h5>
                    </div>
                  </div>
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    {{-- <i class="mdi mdi-format-list-bulleted-type icon-lg me-3 text-primary"></i> --}}
                    <i class="fa-solid fa-percent"></i>&nbsp;&nbsp;
                    <i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;&nbsp;
                    <div class="d-flex flex-column justify-content-around">
                      <a href="{{ route('all-products.index-with-discounts') }}" class="ancor-underline-color">
                        <small class="mb-1 text-muted">With Discounts</small>
                      </a>
                      <h5 class="me-2 mb-0">
                        @if(auth()->user()->user_type == "supplier")
                          ({{ \App\Models\ProductDetail::where('discount', '>', 0)->where('supplier_id', auth()->user()->id)->count() }})
                        @else 
                          ({{ \App\Models\ProductDetail::where('discount', '>', 0)->count() }})
                        @endif
                      </h5>
                    </div>
                  </div>
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <div class="d-flex flex-column justify-content-around">
                      <h5 class="me-2 mb-0">
                        <h1>
                          &plus;
                        </h1>
                      </h5>
                    </div>
                  </div>
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    {{-- <i class="mdi mdi-format-list-bulleted-type icon-lg me-3 text-primary"></i> --}}
                    <i class="fa-solid fa-percent"></i>&nbsp;&nbsp;
                    <i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;&nbsp;
                    <div class="d-flex flex-column justify-content-around">
                      <a href="{{ route('all-products.index-without-discounts') }}" class="ancor-underline-color">
                        <small class="mb-1 text-muted">Without Discounts</small>
                      </a>
                      <h5 class="me-2 mb-0">
                        @if(auth()->user()->user_type == "supplier")
                          ({{ \App\Models\ProductDetail::where('discount', 0)->where('supplier_id', auth()->user()->id)->count() }})
                        @else 
                          ({{ \App\Models\ProductDetail::where('discount', 0)->count() }})
                        @endif
                      </h5>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="final-products" role="tabpanel" aria-labelledby="final-products-tab">
                <div class="d-flex flex-wrap justify-content-xl-between">
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-format-list-bulleted-type icon-lg me-3 text-primary"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-1 text-muted">{{ auth()->user()->user_type == "supplier" ? 'All My Final Products' : 'All Final Products' }}</small>
                      <h5 class="me-2 mb-0">
                        @if(auth()->user()->user_type == "supplier")
                          ({{ \App\Models\FinalProduct::where('supplier_id', auth()->user()->id)->count() }})
                        @else 
                          ({{ \App\Models\FinalProduct::all()->count() }})
                        @endif
                      </h5>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Cash deposits</p>
            <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
            <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
            <canvas id="cash-deposits-chart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Total sales</p>
            <h1>$ 28835</h1>
            <h4>Gross sales over the years</h4>
            <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
            <div id="total-sales-chart-legend"></div>                  
          </div>
          <canvas id="total-sales-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Recent Purchases</p>
            <div class="table-responsive">
              <table id="recent-purchases-listing" class="table">
                <thead>
                  <tr>
                      <th>Name</th>
                      <th>Status report</th>
                      <th>Office</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Gross amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>Jeremy Ortega</td>
                      <td>Levelled up</td>
                      <td>Catalinaborough</td>
                      <td>$790</td>
                      <td>06 Jan 2018</td>
                      <td>$2274253</td>
                  </tr>
                  <tr>
                      <td>Alvin Fisher</td>
                      <td>Ui design completed</td>
                      <td>East Mayra</td>
                      <td>$23230</td>
                      <td>18 Jul 2018</td>
                      <td>$83127</td>
                  </tr>
                  <tr>
                      <td>Emily Cunningham</td>
                      <td>support</td>
                      <td>Makennaton</td>
                      <td>$939</td>
                      <td>16 Jul 2018</td>
                      <td>$29177</td>
                  </tr>
                  <tr>
                      <td>Minnie Farmer</td>
                      <td>support</td>
                      <td>Agustinaborough</td>
                      <td>$30</td>
                      <td>30 Apr 2018</td>
                      <td>$44617</td>
                  </tr>
                  <tr>
                      <td>Betty Hunt</td>
                      <td>Ui design not completed</td>
                      <td>Lake Sandrafort</td>
                      <td>$571</td>
                      <td>25 Jun 2018</td>
                      <td>$78952</td>
                  </tr>
                  <tr>
                      <td>Myrtie Lambert</td>
                      <td>Ui design completed</td>
                      <td>Cassinbury</td>
                      <td>$36</td>
                      <td>05 Nov 2018</td>
                      <td>$36422</td>
                  </tr>
                  <tr>
                      <td>Jacob Kennedy</td>
                      <td>New project</td>
                      <td>Cletaborough</td>
                      <td>$314</td>
                      <td>12 Jul 2018</td>
                      <td>$34167</td>
                  </tr>
                  <tr>
                      <td>Ernest Wade</td>
                      <td>Levelled up</td>
                      <td>West Fidelmouth</td>
                      <td>$484</td>
                      <td>08 Sep 2018</td>
                      <td>$50862</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection