

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <header class="main-header">

        <div class="main-top-header top-header">

            <div class="d-flex align-items-center">

                <div class="device-digi-pub-header-left">

                    <div class="top-header-left-col">

                        <ul>

                            <li>

                                <a href="https://www.india.gov.in/" target="_blank" class="topbartext-color">

                                 भारत सरकार

                                 <br>

                                 Government of India

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

                <div class="ml-auto device-top-header-right">

                    <div class="top-header-right-col">

                        <ul>

                            <li>

                                <ul>

                                    <li>

                                        <a href="##">A</a>

                                    </li>

                                    <li>

                                        <a href="##">A+</a>

                                    </li>

                                    <li>

                                        <a href="##">A-</a>

                                    </li>

                                    <li class="color-selected">

                                        <ul>

                                            <li class="site-color-selected">

                                                <a href="##">A</a>

                                            </li>

                                            <li>

                                                <a href="##">A</a>

                                            </li>

                                        </ul>

                                    </li>

                                </ul>

                            </li>

                            <li>

                                <a class="ea-applications-login" href="#main"><i class="fas fa-lock"></i>&nbsp; {{ trans('messages.SkiptoMainContent')}}</a>

                            </li>

                            <li>

                                <a  class="ea-applications-login" href="#"><i class="fas fa-lock"></i>&nbsp; {{ trans('messages.ScreenReaderAccess')}}</a>

                            </li>

                            <li>



                                <app-language-selector>

                                    <div><button value="en" onclick="setlang('en')" class="lng">EN</button><button value="hn" class="lng" onclick="setlang('hn')">हि</button></div>

                                </app-language-selector>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

        <div class="h2-header-middle-area">

            <div class="container">

                <div class="row justify-content-between">

                    <div class="col-lg-7 col-sm-12 col-12">

                        <div class="logo">

                             <a href="{{url('/')}}"><img src="{{asset('uploads/'.GetOrganisationDetails('logo'))}}" alt="{{GetOrganisationDetails('name')}}"></a>

                        </div>

                    </div>

                    <div class="col-lg-5 col-12 d-flex justify-content-end">

                        <div class="logo">
                            @if(GetOrganisationDetails('logo2'))
                            <a href="{{GetOrganisationDetails('url_logo2')}}" target="_new"><img src="{{asset('uploads/'.GetOrganisationDetails('logo2'))}}" alt="{{GetOrganisationDetails('name')}}"></a>
                            @endif

                             @if(GetOrganisationDetails('logo3'))
                                   <a href="{{GetOrganisationDetails('url_logo3')}}" target="_new"><img src="{{asset('uploads/'.GetOrganisationDetails('logo3'))}}" alt="{{GetOrganisationDetails('name')}}"></a>
                                    @endif
                        </div>

                    </div>

                </div>

            </div>

        </div>

    <nav>   

        <div class="navbar container">

          <i class='bx bx-menu'></i>

         

          <div class="nav-links">

            <div class="sidebar-logo">


              <i class='bx bx-x' ></i>

            </div>

            <ul class="links">

               

                @foreach(GetActiveMenu() as $key=>$M)

              

              <li>

                <a href="@if($M->url =='' || $M->url ==null) javascript:void(0); @else {{$M->url}} @endif" @if($M->external =='yes') target="_blank" onclick="return confirm('You will be redirected to external resource ')" @endif >@if(GetLang()=='en'){{$M->name}}@else {{$M->name_h}} @endif</a>

                

               @if(count($M->GetActiveSubMenu) >= 1)

                <i class='fa fa-chevron-down htmlcss-arrow arrow  '></i>

                <ul class="htmlCss-sub-menu sub-menu">

                    @foreach($M->GetActiveSubMenu as $SM)

                  <li><a href="{{$SM->url}}" @if($SM->external =='yes') target="_blank" onclick="return confirm('You will be redirected to external resource ')" @endif >@if(GetLang()=='en'){{$SM->name}} @else {{$SM->name_h}} @endif</a></li>

                    @endforeach

                  

                </ul>

                @endif

              </li>

              @endforeach

             

            </ul>

          </div>

          <div class="search-box">

            <i class='fa fa-search'></i>

            <div class="input-box">

              <input type="text" placeholder="Search...">

            </div>

          </div>

        </div>

    </nav>

    </header>



  <script type="text/javascript">

    // search-box open close js code

let navbar = document.querySelector(".navbar");

let searchBox = document.querySelector(".search-box .fa-search");

// let searchBoxCancel = document.querySelector(".search-box .bx-x");



searchBox.addEventListener("click", ()=>{

  navbar.classList.toggle("showInput");

  if(navbar.classList.contains("showInput")){

    searchBox.classList.replace("fa-search" ,"fa-times");

  }else {

    searchBox.classList.replace("fa-times" ,"fa-search");

  }

});



// sidebar open close js code

let navLinks = document.querySelector(".nav-links");

let menuOpenBtn = document.querySelector(".navbar .bx-menu");

let menuCloseBtn = document.querySelector(".nav-links .fa-times");

menuOpenBtn.onclick = function() {

navLinks.style.left = "0";

}

menuCloseBtn.onclick = function() {

navLinks.style.left = "-100%";

}





// sidebar submenu open close js code

let htmlcssArrow = document.querySelector(".htmlcss-arrow");

htmlcssArrow.onclick = function() {

 navLinks.classList.toggle("show1");

}

// let moreArrow = document.querySelector(".more-arrow");

// moreArrow.onclick = function() {

//  navLinks.classList.toggle("show2");

// }

let jsArrow = document.querySelector(".js-arrow");

jsArrow.onclick = function() {

 navLinks.classList.toggle("show3");

}



</script>
