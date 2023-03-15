<nav class="sidebar sidebar-offcanvas @if(Route::is('dashboard.login')) d-none @endif" id="sidebar">
        <ul class="nav">

          <li class="nav-item text-center">
              <span class="menu-title fw-bold">
                @if(auth()->user()->user_type == "admin")
                  Admin
                @elseif(auth()->user()->user_type == "moderator")
                  Moderartor
                @else(auth()->user()->user_type == "supplier")
                  Supplier  
                @endif
                Dashboard
              </span>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
              <i class="mdi mdi-home-variant menu-icon"></i>
              <span class="menu-title">Website</span>
            </a>
          </li>

          @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
            <li class="nav-item">
              <a class="nav-link" href="{{ route('settings.index') }}" target="_blank">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Settings</span>
              </a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-excel" aria-expanded="false" aria-controls="ui-basic-excel">
                <i class="fas fa-file-excel menu-icon"></i>
                <span class="menu-title">Excel (Import/Export)</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-excel">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('import-export-view-users') }}">All Users</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Carts&nbsp;<span style="font-size: 70%;" class="fw-bold text-danger">(Export Only!)</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Contact Info&nbsp;<span style="font-size: 70%;" class="fw-bold text-danger">(Export Only!)</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('import-export-view-categories') }}">Categories</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('import-export-view-sub-categories') }}">Sub-categories</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Products</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-users" aria-expanded="false" aria-controls="ui-basic-users">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-users">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('users.create') }}">Create User</a></li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                      All Users 
                      ({{ \App\Models\User::all()->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.indexAdmins') }}">
                      Admins 
                      ({{ \App\Models\User::type('admin')->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.indexModerators') }}">
                      Moderators 
                      ({{ \App\Models\User::type('moderator')->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.indexSuppliers') }}">
                      Suppliers 
                      ({{ \App\Models\User::type('supplier')->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.indexCustomers') }}">
                      Customers 
                      ({{ \App\Models\User::type('customer')->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.indexActiveUsers') }}">
                      Active Users 
                      ({{ \App\Models\User::where('status', 'active')->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.indexInactiveUsers') }}">
                      Inactive Users 
                      ({{ \App\Models\User::where('status', 'inactive')->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.indexBlockedUsers') }}">
                      Blocked Users 
                      ({{ \App\Models\User::where('status', 'blocked')->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">
                      Deleted Users 
                      ({{ \App\Models\User::onlyTrashed()->count() }})
                    </a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('import-export-view-users') }}"><i class="fas fa-file-excel"></i>&nbsp;Excel (Import/Export)</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-contact-us" aria-expanded="false" aria-controls="ui-basic-contact-us">
                <i class="mdi mdi-contact-mail menu-icon"></i>
                <span class="menu-title">Contact Us Info</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-contact-us">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('contact-us.index') }}">All Contact Us Info ({{ \App\Models\ContactUs::all()->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('registered-users-contact-us-info') }}">Registered Users ({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('customers-contact-us-info') }}">Customers Users ({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'customer')->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('suppliers-contact-us-info') }}">Suppliers Users ({{ \App\Models\ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'supplier')->count() }})</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('unregistered-users-contact-us-info') }}">Unregistered Users ({{ \App\Models\ContactUs::whereNull('create_user_id')->whereNull('user_type')->count() }})</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-categories" aria-expanded="false" aria-controls="ui-basic-categories">
                <i class="mdi mdi-view-grid menu-icon"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-categories">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('categories.create') }}">Create Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">All Categories</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('categories.delete') }}">Deleted Categories</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('import-export-view-categories') }}"><i class="fas fa-file-excel"></i>&nbsp;Excel (Import/Export)</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-sub-categories" aria-expanded="false" aria-controls="ui-basic-sub-categories">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Sub-categories</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-sub-categories">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('subcategories.create') }}">Create Sub-category</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('subcategories.index') }}">All Sub-categories</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('subcategories.delete') }}">Deleted Sub-categories</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('import-export-view-sub-categories') }}"><i class="fas fa-file-excel"></i>&nbsp;Excel (Import/Export)</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-products" aria-expanded="false" aria-controls="ui-basic-products">
                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-products">
                <ul class="nav flex-column sub-menu">
                  <li><span class="text-decoration-underline">Products Details</span> [ <i class="fa-solid fa-1"></i> ]</li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('all-products.create') }}">Create Product Detail</a></li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.index') }}">
                      All Products Details 
                      ({{ \App\Models\ProductDetail::all()->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.index-with-discounts') }}">
                      ..With Discounts 
                      ({{ \App\Models\ProductDetail::where('discount', '>', 0)->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.index-without-discounts') }}">
                      ..Without Discounts 
                      ({{ \App\Models\ProductDetail::where('discount', '=', 0)->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.delete') }}">
                      Deleted Products Details 
                      ({{ \App\Models\ProductDetail::onlyTrashed()->count() }})
                    </a>
                  </li>
                  {{-- <hr class="w-75"> --}}
                  <li>&downarrow;</li>
                  <li><span class="text-decoration-underline">Final Products</span> [ <i class="fa-solid fa-2"></i> ]</li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('products.create') }}">Create Final Product</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('products.delete') }}">Deleted Final Products</a></li>
                </ul>
              </div>
            </li>
          @elseif(auth()->user()->user_type == "supplier")
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-products" aria-expanded="false" aria-controls="ui-basic-products">
                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                <span class="menu-title">My Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-products">
                <ul class="nav flex-column sub-menu">
                  <li><span class="text-decoration-underline">Products Details</span> [ <i class="fa-solid fa-1"></i> ]</li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('all-products.create') }}">Create Product Detail</a></li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.index') }}">
                      All Products Details 
                      ({{ \App\Models\ProductDetail::where('supplier_id', auth()->user()->id)->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.index-with-discounts') }}">
                      ..With Discounts 
                      ({{ \App\Models\ProductDetail::where('discount', '>', 0)->where('supplier_id', auth()->user()->id)->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.index-without-discounts') }}">
                      ..Without Discounts 
                      ({{ \App\Models\ProductDetail::where('discount', '=', 0)->where('supplier_id', auth()->user()->id)->count() }})
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('all-products.delete') }}">
                      Deleted Products Details 
                      ({{ \App\Models\ProductDetail::where('supplier_id', auth()->user()->id)->onlyTrashed()->count() }})
                    </a>
                  </li>
                  {{-- <hr class="w-75"> --}}
                  <li>&downarrow;</li>
                  <li><span class="text-decoration-underline">Final Products</span> [ <i class="fa-solid fa-2"></i> ]</li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('products.create') }}">Create Final Product</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('products.delete') }}">Deleted Final Products</a></li>
                </ul>
              </div>
            </li>
          @endif
        </ul>
      </nav>