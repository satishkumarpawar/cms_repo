



    <!-- quick link start -->



        <div class="container pb-30 pt-30">



            <div class="row">



                <div class="col-lg-4 col-md-6 col-12 circular-grid">



                    <div class="circular-box">



                        <h4>{{ trans('messages.Circulars')}}</h4>

                          @if(count(GetAnnouncements('Circulars')) > 0)

                        <div class="circular-content">



                           @foreach(GetAnnouncements('Circulars') as $C)



                            <div class="inside-circular">



                                <i class="fas fa-info-circle"></i>

                                <a href="{{url($C->slug)}}">

                                <div class="budget-cont">



                                    <p>@if(GetLang()=='en'){{$C->title}} @else {{$C->title_h}} @endif</p>



                                    <p>{{$C->start_date}}</p>



                                </div>

                            </a>

                            </div>



                           @endforeach



                        </div>



                        <div class="text-right pt-4">



                           <a class="read-more-btn" href="{{url('circular')}}">{{ trans('messages.Viewall')}}</a>



                        </div>

                        @else



                        <div class="circular-content">

                            <div class="inside-circular">

                                <div class="budget-cont">

                                    <p>{{ trans('messages.NoContentAvailable')}}</p>

                                </div>

                            </div>

                        </div>

                        @endif

                    </div>



                </div>



                <div class="col-lg-4 col-md-6 col-12 circular-grid">



                    <div class="circular-box ">



                        <h4>{{ trans('messages.QuickLinks')}}</h4>

                        @if(count(FindQuickLink()) > 0)

                        <div class="quick-box">

                            @foreach(FindQuickLink() as $Q)

                            <a href="{{url($Q->slug)}}" class="inside-quick-box">

                               <img src="{{asset('uploads/'.$Q->image)}}" alt="{{$Q->title}}">
                               <p>@if(GetLang()=='en') {{$Q->title}} @else {{$Q->title_h}} @endif</p>                           
                            </a>

                           @endforeach



                        </div>

                        @else

                              <div class="circular-content">

                            <div class="inside-circular">

                                <div class="budget-cont">

                                    <p>{{ trans('messages.NoContentAvailable')}}</p>

                                </div>

                            </div>

                        </div>

                        @endif

                    </div>



                </div>



                <div class="col-lg-4 col-md-6 col-12 uppper-space">



                    <div class="ph-gallery">



                        <a href="{{url('photo-gallery')}}">

                            <?php
                    $fa=\App\Models\BannerSlider::where('type','Photo Gallery')->where('title','Upcoming')->first();?>

                    @if($fa)
                      <img src="{{asset('uploads/'.$fa->image)}}" alt="" >
                    @else
                      <img src="{{asset('front/img/home1/service-1.jpg')}}" alt="">
                      @endif
                    

                            


                            <h4>{{ trans('messages.PhotoGallery')}}</h4>



                        </a>



                    </div>



                    <div class="ph-gallery mb-0">



                        <a href="{{url('video-gallery')}}">



                                <?php
                    $fa1=\App\Models\BannerSlider::where('type','Video Gallery')->where('title','Upcoming')->first();?>

                    @if($fa1)
                      <img src="{{asset('uploads/'.$fa1->image)}}" alt="" >
                    @else
                      <img src="{{asset('front/img/home1/service-2.jpg')}}" alt="">
                      @endif
                   



                            <h4>{{ trans('messages.VideoGallery')}}</h4>



                        </a>



                    </div>



                </div>



            </div>



        </div>



    <!-- quick link end -->