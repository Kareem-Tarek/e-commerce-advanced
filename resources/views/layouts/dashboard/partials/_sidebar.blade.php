<nav class="sidebar sidebar-offcanvas" id="sidebar">
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
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-products" aria-expanded="false" aria-controls="ui-basic-products">
                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic-products">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Create Product</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('products_details.index') }}">All Products</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Deleted Products</a></li>
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
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Create User</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">All Users</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Admins</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Moderators</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Suppliers</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Customers</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Blocked Users</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Deleted Users</a></li>
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
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Create Product</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('products_details.index') }}">All My Products</a></li>
                  <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Deleted Products</a></li>
                </ul>
              </div>
            </li>
          @endif
        </ul>
      </nav>