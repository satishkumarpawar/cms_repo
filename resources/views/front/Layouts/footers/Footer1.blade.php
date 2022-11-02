<!-- footer start -->



    <footer class="h3-footer">



        <div class="h3-footer-top-area">



            <div class="container">



                <div class="row">



                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">



                        <div class="about-h3aw h3-footer-widget">



                            <h4 class="title">About Company</h4>



                            <span class="text" style="text-align:justify;"><?php if(GetLang()=='en'){echo GetOrganisationDetails('about');}else{echo GetOrganisationDetails('about_h');}?></span>



                            <a class="more" href="{{url('about-us')}}">Read More  <span><i class="fas fa-angle-right"></i></span></a>



                        </div>



                    </div>



                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">



                        <div class="cat-h3aw h3-footer-widget">



                            <h4 class="title">Quick Links</h4>



                            <ul class="cat-list">

                                 @foreach(FindQuickLink() as $Q)

                                <li><a href="{{url('/').'/'.$Q->slug}}"><span><i class="fas fa-long-arrow-alt-right"></i></span> @if(GetLang()=='en') {{$Q->title}} @else {{$Q->title_h}} @endif</a></li>

                                @endforeach

                            </ul>



                        </div>



                    </div>



                    



                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">



                        <div class="contact-h3aw h3-footer-widget">



                            <h4 class="title">Address</h4>



                            <ul class="c-info">



                                <li><span><i class="fas fa-envelope"></i></span>{{GetOrganisationDetails('email')}}</li>



                                <li><span><i class="fas fa-phone"></i></span>{{GetOrganisationDetails('contact')}}</li>



                                <li><span><i class="fas fa-map-marker-alt"></i></span>

                                    @if(GetLang()=='en'){{GetOrganisationDetails('address')}} @else {{GetOrganisationDetails('address_h')}} @endif

                                </li>



                            </ul>



                        </div>



                    </div>







                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">



                        <div class="contact-h3aw h3-footer-widget">



                            <h4 class="title">Last Update</h4>



                            <ul class="c-info">



                                <li class="p-0"> Last Update :- {{GetLastUpdate()}}</li>



                                <li class="p-0">Visitor Counter :- {{GetVisits()}}</li>  



                            </ul>



                            



                        </div>



                    </div>



                </div>



            </div>



        </div>



        <div class="h3-footer-bottom-area">



            <div class="container">



                <div class="row">



                    <div class="col-lg-6 col-md-7 col-sm-12 col-12">



                        <div class="h3fb-left">



                            <p><a href="/">copyright</a> © 2022. All Rights Reserved.</p>



                        </div>



                    </div>



                    <div class="col-lg-6 col-md-5 col-sm-12 col-12">



                        <div class="h3fb-social">



                            <ul>


                                <li><a href="{{GetOrganisationDetails('facebook')}}" target="_new"><i class="fab fa-facebook-f"></i></a></li>



                                <li><a href="{{GetOrganisationDetails('twitter')}}" target="_new"><i class="fab fa-twitter"></i></a></li>



                                <li><a href="{{GetOrganisationDetails('linkedin')}}" target="_new"><i class="fab fa-linkedin-in"></i></a></li>



                                <li><a href="{{GetOrganisationDetails('pintrest')}}" target="_new"><i class="fab fa-pinterest-p"></i></a></li>



                                <li><a href="{{GetOrganisationDetails('instagram')}}" target="_new"><i class="fab fa-instagram"></i></a></li>



                            </ul>



                        </div>



                    </div>



                </div>



            </div>



        </div>



    </footer>





    <!-- footer end -->