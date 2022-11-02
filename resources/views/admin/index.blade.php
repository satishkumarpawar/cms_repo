<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{$title}} | {{GetOrganisationDetails('name')}}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('uploads/'.GetOrganisationDetails('fevicon'))}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="{{asset('uploads/'.GetOrganisationDetails('logo'))}}" alt="logo">
              </div>
              @if($errors->any())
              <div class="alert alert-danger">
              <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
            </div>
            @endif
            @if(Session::has('error'))
              <div class="alert alert-danger">
                  <strong>Oops!</strong> {{ Session::get('error') }}
                </div>
            @endif
            @if(Session::has('success'))
              <div class="alert alert-success">
                   {{ Session::get('success') }}
                </div>
            @endif
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form method="Post" action="{{route('admin.login')}}">
                @csrf
              <form class="pt-3">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-group mt-3 mb-3">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger" class="refresh-captcha" id="refresh-captcha">
                        &#x21bb;
                    </button>
                </div>
              </div>
              <div class="form-group mb-4">
                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
             </div>
                <div class="mt-3">
                   <button type="submit" class="btn btn-block btn-facebook " style="background: #eb6a2a;">
                   <b> Login</b>
                  </button>
                </div>
              </form>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                   
                  </div>
                  <a href="{{route('admin.forgotpsw')}}" class="auth-link text-black">Forgot password?</a>
                </div>
                
              <!--  <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>-->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{url('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('admin/js/off-canvas.js')}}"></script>
  <script src="{{url('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('admin/js/template.js')}}"></script>
  <script src="{{url('admin/js/settings.js')}}"></script>
  <script src="{{url('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

<script type="text/javascript">
    $('#refresh-captcha').click(function () {
        $.ajax({
            type: 'GET',
            url: '<?php echo url('refresh-captcha');?>',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

</script>
</html>
