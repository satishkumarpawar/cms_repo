<!DOCTYPE html>

<html lang="en">



<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title> @yield('title') | {{GetOrganisationDetails('name')}}</title>

  <!-- plugins:css -->

  <link rel="stylesheet" href="{{url('admin/vendors/feather/feather.css')}}">

  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">

  <link rel="stylesheet" href="{{url('admin/vendors/css/vendor.bundle.base.css')}}">

  <!-- endinject -->

  <!-- Plugin css for this page -->

  <link rel="stylesheet" href="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">

  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">

  <link rel="stylesheet" type="text/css" href="{{url('admin/js/select.dataTables.min.css')}}">

  <!-- End plugin css for this page -->

  <!-- inject:css -->

  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/style.css')}}">

 <link rel="stylesheet" href="{{url('admin/css/custom.css')}}">

  <!-- endinject -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



  <link rel="shortcut icon" href="{{asset('uploads/'.GetOrganisationDetails('fevicon'))}}" />

  <script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>
  <meta name="csrf_token" content="{{ csrf_token() }}" />

  <style type="text/css">

    .thumb{

      width: 15%;

      height: 15%;

    }

  </style>

</head>

<body>

  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo mr-5" href="{{route('admin.dashboard')}}"><img src="{{asset('uploads/'.GetOrganisationDetails('logo'))}}" class="mr-2" alt="logo"/></a>

        <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}"><img src="{{asset('uploads/'.GetOrganisationDetails('logo'))}}" alt="logo"/></a>

      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

          <span class="icon-menu"></span>

        </button>

        <ul class="navbar-nav mr-lg-2">

          <li class="nav-item nav-search d-none d-lg-block">

            <div class="input-group">

              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">

                <span class="input-group-text" id="search">

                  <i class="icon-search"></i>

                </span>

              </div>

              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">

            </div>

          </li>

        </ul>

        <ul class="navbar-nav navbar-nav-right">

          

          <li class="nav-item nav-profile dropdown">
            <span style="margin-right:10px;"><b>{{\Auth::guard('admin')->user()->name}}</b></span>
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

              <img src="{{url('admin/images/default-profile-icon.jpg')}}" alt="profile"/>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              <a class="dropdown-item" href="{{route('admin.password-change')}}">

                <i class="ti-settings text-primary"></i>

                Change Password

              </a>

              <a class="dropdown-item" href="{{route('admin.logout')}}">

                <i class="ti-power-off text-primary"></i>

                Logout

              </a>

            </div>

          </li>

          

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

          <span class="icon-menu"></span>

        </button>

      </div>

    </nav>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_settings-panel.html -->

   

     

       @include('admin.Layout.sidebar')



       @yield('content')





       <!-- partial:partials/_footer.html -->

        <footer class="footer">

          <div class="d-sm-flex justify-content-center justify-content-sm-between">

            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  {{GetOrganisationDetails('name')}}. All rights reserved.</span>

           

          </div>

        

        </footer> 

        <!-- partial -->

      </div>

      <!-- main-panel ends -->

    </div>   

    <!-- page-body-wrapper ends -->

  </div>

  <!-- container-scroller -->



  <!-- plugins:js -->



  <script src="{{url('admin/vendors/js/vendor.bundle.base.js')}}"></script>

  <!-- endinject -->

  <!-- Plugin js for this page -->

  <script src="{{url('admin/vendors/chart.js/Chart.min.js')}}"></script>

  <!--<script src="{{url('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>-->

  <script src="{{url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

  <script src="{{url('admin/js/dataTables.select.min.js')}}"></script>



  <!-- End plugin js for this page -->

  <!-- inject:js -->

  <script src="{{url('admin/js/off-canvas.js')}}"></script>

  <script src="{{url('admin/js/hoverable-collapse.js')}}"></script>

  <script src="{{url('admin/js/template.js')}}"></script>

  <script src="{{url('admin/js/settings.js')}}"></script>

  <script src="{{url('admin/js/todolist.js')}}"></script>

  <!-- endinject -->

  <!-- Custom js for this page-->

  <script src="{{url('admin/js/dashboard.js')}}"></script>

  <script src="{{url('admin/js/Chart.roundedBarCharts.js')}}"></script>

  <!-- End custom js for this page-->

</body>



</html>





