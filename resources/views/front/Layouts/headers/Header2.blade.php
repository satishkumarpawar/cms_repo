



<header class="option2header"> 



            <div class="topHeader text-right">



                <div class="container">



                    <div class="row"> 



                        <div class="col-xs-12 col-sm-12 col-md-12 topRightHeader">



                            <div class="commonPanel pull-right">



                                <div class="dropdown searchBtn"> 



                                    <a href="javascript:void(0);" type="button" data-toggle="dropdown"><img src="{{asset('front/img/icon1.png')}}"></a>



                                    <ul class="dropdown-menu searchBoxSt max-wd">



                                      <div class="input-group">



                                        <input type="text" class="search-query form-control" placeholder="Search">



                                        <span class="input-group-btn">



                                        <button class="btn btn-danger" type="button"> <span class="fa fa-search"></span> </button>



                                        </span> </div>



                                    </ul>



                                </div>



                                <div class="dropdown">



                                    <select class="language-input languageBox lng" type="button" onchange="setlang(this.value)">



                                     <option value="en" @if(GetLang()=='en') selected @endif>English</option>



                                     <option value="hn" @if(GetLang()=='hn') selected @endif>हिन्दी</option>



                                    </select>



                                </div>



                                <div class="dropdown hidden-xs hidden-sm"> <a title="Skip to main content" href="#main-content" class="skipcontent"><img src="{{asset('front/img/icon2.png')}}"></a> </div>



                                <div class="dropdown hidden-xs hidden-sm"> <a title="High Dark Contrast" href="#main-content"><img src="{{asset('front/img/icon3.png')}}"></a> </div>



                                <div class="dropdown"> <a href="sitemap.php" title="Sitemap"><img src="{{asset('front/img/icon4.png')}}"></a> </div>  



                                <div class="dropdown"> <a href="#" title="Screen Reader"><img src="{{asset('front/img/icon5.png')}}"></a> </div>  



                                <div class="dropdown"> <a href="#" title="Login"><img src="{{asset('front/img/icon6.png')}}"></a> </div>               



                            </div>



                        </div>



                    </div>



                </div>



            </div>







            <div class="h2-header-middle-area">



                <div class="container">



                    <div class="row justify-content-between">



                        <div class="col-lg-7 col-sm-12 col-12">



                            <div class="logo">



                                 <a href="{{url('/')}}"><img src="{{asset('uploads/'.GetOrganisationDetails('logo'))}}" alt="{{GetOrganisationDetails('name')}}">



                              </a>



                            </div>



                        </div>



                        <div class="col-lg-5 col-12 d-flex justify-content-end">



                            <div class="logo">

                                    @if(GetOrganisationDetails('logo2'))

                                   <a href="{{GetOrganisationDetails('url_logo2')}}" target="_new"><img src="{{asset('uploads/'.GetOrganisationDetails('logo2'))}}" alt="{{GetOrganisationDetails('name')}}">

                                    @endif



                                     @if(GetOrganisationDetails('logo3'))

                                   <a href="{{GetOrganisationDetails('url_logo3')}}" target="_new"><img src="{{asset('uploads/'.GetOrganisationDetails('logo3'))}}" alt="{{GetOrganisationDetails('name')}}">

                                    @endif

                            </div>



                        </div>



                    </div>



                </div>



            </div>



           



            <nav>   



        <div class="navbar navbaroption2">



          <i class='bx bx-menu'></i>



            <!--   <div class="logo"><a href="#">CodingLab</a></div> -->



          <div class="nav-links">



            <div class="sidebar-logo">



              <!-- <span class="logo-name">CodingLab</span> -->



              <i class='bx bx-x' ></i>



            </div>



            <ul class="links header2-menu">



                @foreach(GetActiveMenu() as $key=>$M)



              <li>



                <a href="@if($M->url =='' || $M->url ==null) javascript:void(0); @else {{$M->url}} @endif" @if($M->external =='yes') target="_blank" onclick="return confirm('You will be redirected to external resource ')"  @endif>@if(GetLang()=='en'){{$M->name}}@else {{$M->name_h}} @endif</a>



                



               @if(count($M->GetActiveSubMenu) >= 1)



                <i class='fa fa-chevron-down htmlcss-arrow arrow  '></i>



                <ul class="htmlCss-sub-menu sub-menu">



                    @foreach($M->GetActiveSubMenu as $SM)



                  <li><a href="{{$SM->url}}" @if($SM->external =='yes') target="_blank" onclick="return confirm('You will be redirected to external resource ')"  @endif>@if(GetLang()=='en'){{$SM->name}} @else {{$SM->name_h}} @endif</a></li>



                    @endforeach



                  



                </ul>



                @endif



              </li>



              @endforeach



            </ul>



          </div>



          <!-- <div class="search-box">



            <i class='bx bx-search'></i>



            <div class="input-box">



              <input type="text" placeholder="Search...">



            </div>



          </div> -->



        </div>



    </nav>



        </header>











         <script type="text/javascript">



    // search-box open close js code 



let navbar = document.querySelector(".navbar");











// sidebar open close js code



let navLinks = document.querySelector(".nav-links");



let menuOpenBtn = document.querySelector(".navbar .bx-menu");



let menuCloseBtn = document.querySelector(".nav-links .bx-x");



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