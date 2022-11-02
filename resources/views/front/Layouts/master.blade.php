<!DOCTYPE html>

<html lang="en">



<head>

    <!--- Basic Page Needs  -->

    <meta charset="utf-8">

    <title> @yield('title') {{GetOrganisationDetails('name')}}</title>

    <meta name="description" content=" @yield('description')">

    <meta name="author" content="">

    <meta name="keywords" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Specific Meta  -->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->

    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/jquery-ui.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/fontawesome-all.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/pogo-slider.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/meanmenu.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/png" href="{{asset('uploads/'.GetOrganisationDetails('fevicon'))}}">

  

</head>



<body>

    

    <div id="preloader"></div>



   

    @if(FindSiteSettings('Home','header'))
        @include('front.Layouts.headers.'.FindSiteSettings('Home','header'))
    @endif



    

  



    @yield('content')



    

    @if(FindSiteSettings('Home','footer'))
        @include('front.Layouts.footers.'.FindSiteSettings('Home','footer'))
    @endif

    





    <!-- Scripts -->



    <script src="{{asset('front/js/jquery-3.2.0.min.js')}}"></script>

    <script src="{{asset('front/js/jquery-ui.js')}}"></script>

    <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('front/js/jquery.pogo-slider.min.js')}}"></script>

    <script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>

    <script src="{{asset('front/js/parallax.js')}}"></script>

    <script src="{{asset('front/js/countdown.js')}}"></script>

    <script src="{{asset('front/js/jquery.fancybox.min.js')}}"></script>

    <script src="{{asset('front/js/imagesLoaded-PACKAGED.js')}}"></script>

    <script src="{{asset('front/js/isotope-packaged.js')}}"></script>

    <!-- <script src="js/jquery.meanmenu.js"></script> -->

    <script src="{{asset('front/js/jquery.scrollUp.js')}}"></script>

    <script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('front/js/jquery.mixitup.min.js')}}"></script>

    <script src="{{asset('front/js/jquery.waypoints.min.js')}}"></script>

    <script src="{{asset('front/js/popper.min.js')}}"></script>

    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('front/js/theme.js')}}"></script>

    <script src="{{asset('front/js/custom.js')}}"></script>

    

 
<script>
  $(window).on("load",function(){$.ajax({url:"{{url('/')}}/my-cms-mgmt",type:"get",success:function(n){}})});
</script>



</body>

</html>