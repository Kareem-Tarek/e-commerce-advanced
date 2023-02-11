<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/dashboard/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/assets/dashboard/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="/assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/assets/dashboard/css/style.css">
  <!-- endinject -->
  <!-- icon in the title -->
  <link rel="icon" href="/assets/images/logos/Anywhere-Anytime(1).png" type="image/x-icon">
  <link rel="shortcut icon" href="/assets/images/logos/Anywhere-Anytime(1).png" type="image/x-icon">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Almarai&family=Harmattan&display=swap" rel="stylesheet">
  <!-- Bootstrap 4 CDN-->
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
</head>
<body>
  <div class="container-scroller">

    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more!</p>
              <span class="text-light">Contact Us at&nbsp;&nbsp;&RightArrow;&nbsp;&nbsp;</span>
              <a href="javascript:void(0);" class="text-light">
                <a href="http://wa.me/+201010110457" class="btn me-1 buy-now-btn border-0 text-decoration-underline" target="_blank">+201010110457</a><i class="fa-brands fa-whatsapp text-light"></i> &nbsp;<span class="text-light">|</span>&nbsp;
                <a href="https://github.com/Kareem-Tarek" class="btn me-1 buy-now-btn border-0 text-decoration-underline" target="_blank">KareemDev</a><i class="fa-brands fa-github text-light"></i> &nbsp;<span class="text-light">|</span>&nbsp; 
                <a href="https://kareemtarekpk@gmail.com" class="btn me-1 buy-now-btn border-0 text-decoration-underline" target="_blank">kareemtarekpk@gmail.com</a><i class="fa-brands fa-google text-light"></i>
              </a>
            </div>
          </div>
          <h6 class="mb-0 font-weight-medium me-3 buy-now-text">
            Last login at: 
            <span class="text-warning">
              {{ date('(D) d-m-Y h:m A', strtotime(auth()->user()->last_login_at)) }}
            </span>
          </h6>
          <div class="d-flex align-items-center justify-content-between">
            {{-- <a href="https://www.bootstrapdash.com/product/majestic-admin-pro/"><i class="mdi mdi-home me-3 text-white"></i></a> --}}
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- partial:partials/_navbar.blade.php -->
    @include('layouts.dashboard.partials._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.blade.php -->
      @include('layouts.dashboard.partials._sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.blade.php -->
        @include('layouts.dashboard.partials._footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="/assets/dashboard/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="/assets/dashboard/vendors/chart.js/Chart.min.js"></script>
  <script src="/assets/dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/assets/dashboard/js/off-canvas.js"></script>
  <script src="/assets/dashboard/js/hoverable-collapse.js"></script>
  <script src="/assets/dashboard/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/assets/dashboard/js/dashboard.js"></script>
  <script src="/assets/dashboard/js/data-table.js"></script>
  <script src="/assets/dashboard/js/jquery.dataTables.js"></script>
  <script src="/assets/dashboard/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="/assets/dashboard/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

