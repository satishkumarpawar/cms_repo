<!-- footer start -->

    <footer class="footeroption2">

        <div class="h3-footer-top-area">

            <div class="container">

                <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                        <iframe frameborder="0" src="{{GetOrganisationDetails('location')}}" width="100%" height="200px"></iframe>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                        <div class=" contact-h3aw h3-footer-widget footer-widgetoption2">

                            <h4 class="title title-update">{{ trans('messages.Address')}}</h4>

                            <ul class="c-info c-info-edit">

                                <li>  @if(GetLang()=='en'){{GetOrganisationDetails('address')}} @else {{GetOrganisationDetails('address_h')}} @endif</li>

                                

                                <li>{{ trans('messages.Phone')}}: {{GetOrganisationDetails('contact')}}</li>

                                <li>{{ trans('messages.Email')}} : {{GetOrganisationDetails('email')}}</li>

                            </ul>



                        </div>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                        <div class="contact-h3aw h3-footer-widget footer-widgetoption2">

                            <ul class="c-info c-info-edit">

                                <li> {{ trans('messages.WebsiteContentManagedby')}}</li>

                                <li>{{GetOrganisationDetails('name')}}</li>

                            </ul>

                            <br>

                            <ul class="c-info c-info-edit">

                                <li>{{ trans('messages.DesignedDevelopedandHostedby')}}</li>

                                <li>National Informatics Centre( NIC )</li>

                            </ul>

                        </div>

                    </div>

                    

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">

                        <div class="contact-h3aw h3-footer-widget footer-widgetoption2">

                            <ul class="c-info">

                                <li> <strong>{{ trans('messages.TotalVisitors')}}</strong> :- {{GetVisits()}}</li>

                                <li><strong>{{ trans('messages.LastUpdated')}}</strong> :- {{GetLastUpdate()}}</li>  

                            </ul>

                            <h4 class="title title-update mt-4">{{ trans('messages.FollowUson')}}:</h4>

                            <div class="h3fb-social social-option2">

                                <ul>

                                    <li><a href="{{GetOrganisationDetails('facebook')}}" class="facebook-option"><i class="fab fa-facebook-f"></i></a></li>

                                    <li><a href="{{GetOrganisationDetails('twitter')}}" class="twitter-option"><i class="fab fa-twitter"></i></a></li>

                                    <li><a href="{{GetOrganisationDetails('youtube')}}" class="youtube-option"><i class="fab fa-youtube"></i></a></li>

                                   

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="h3-footer-bottom-area">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-4 col-md-5 col-sm-12 col-12">

                        <div class="h3fb-left">

                            <p>{{ trans('messages.copyright')}}.</p>

                        </div>

                    </div>

                    <div class="col-lg-8 col-md-7 col-sm-12 col-12 footer-condition">

                        <ul>

                            <li><a href="{{url('feedback')}}">{{ trans('messages.Feedback')}}</a></li>

                            <li><a href="{{url('how-to-reach')}}">{{ trans('messages.Howtoreachus')}}</a></li>

                            <li><a href="{{url('contact-us')}}">{{ trans('messages.ContactUs')}}</a></li>

                            <li><a href="#">{{ trans('messages.EmployeesCorner')}}</a></li>

                            <li><a href="{{url('terms/privacy-policy')}}">{{ trans('messages.PrivacyPolicy')}}</a></li>

                            <li><a href="{{url('terms/disclaimer')}}">{{ trans('messages.Disclaimer')}}</a></li>

                            <li><a href="{{url('terms/help')}}">{{ trans('messages.Help')}}</a></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <!-- footer end-->