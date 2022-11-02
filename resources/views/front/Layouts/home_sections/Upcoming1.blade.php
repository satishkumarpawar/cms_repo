    <!-- upcoming training start -->



    <section class="pb-30 pt-30">



        <div class="container">



            <div class="text-center">



                <h3 class="title-heading border-0">{{ trans('messages.UpcomingEventsProgrammes')}}</h3>



                



            </div>



            <div class="row">



                <div class="col-lg-6 d-inline-flex">

                   <?php 
                    $fa=\App\Models\BannerSlider::where('type','Front Image')->where('title','Upcoming')->first();?>

                    @if($fa)
                      <img src="{{asset('uploads/'.$fa->image)}}" alt="" width="100%" class="rounded">
                    @else
                     <img src="{{asset('front/img/about/tab-banner.jpg')}}" alt="" width="100%" class="rounded">
                    @endif
                   


                </div>



                <div class="col-lg-6 upcoming-list"> 



                    @if(count(GetAnnouncements('Events')) > 0)



                      @foreach(GetAnnouncements('Events') as $E)



                        <div class="inside-upcoming-list row mb-2">



                            <div class="upcoming-date col-md-2">



                                <span>{{date('d',$E->start_time)}}</span>



                                <span class="inside-date">{{getMonth(date('m',$E->start_time))}}</span>



                            </div>



                            <div class="upcoming-content col-md-10">



                                <p><strong>Title: </strong><a href="{{url('events/'.$E->slug)}}">@if(GetLang()=='en'){{$E->title}} @else {{$E->title_h}} @endif </a></p>



                                



                                <p><strong>Date: </strong>From {{$E->start_date}} to {{$E->end_date}}</p>



                              



                            </div>



                        </div>



                        



                        @endforeach

                         <div class="text-right">



                           <a class="read-more-btn" href="{{url('events')}}">{{ trans('messages.ReadMore')}}</a>



                         </div>

                       

                        @else

                     <div class="inside-upcoming-list row mb-2">



                            <div class="upcoming-date col-md-2">



                                



                            </div>



                            <div class="upcoming-content col-md-10">



                                <p><strong>{{ trans('messages.NoContentAvailable')}}</strong></p>



                                



                            </div>



                        </div>



                     @endif

                    



                       



                </div>



                



            </div>



        </div>



    </section>



    <!-- upcoming training end -->







