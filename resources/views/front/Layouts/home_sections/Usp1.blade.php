    <!-- shape start -->

@if(count(GetActiveUSPs()) > 0)

    <div class="counter-area bg-with-black">



        <div class="container">



            <div class="row">



                <div class="col-12 main-shape">

                   @foreach(GetActiveUSPs() as $USP)

                    <div class="col-md-3 d-flex justify-content-center mb-3">

                        <div class="text-center shape-content">

                            <div class="hex3">

                               <a href="{{$USP->url}}"> <img src="{{asset('uploads/'.$USP->image)}}" alt="{{$USP->name}}">

                            </div>

                            <h6 class="text-light">@if(GetLang()=='en') {{$USP->name}} @else {{$USP->name_h}} @endif</h6>
                            </a>
                         </div>

                    </div>

                    

                    

                  @endforeach

                </div>



                



            </div>



        </div>



    </div>

@endif

    <!-- shape end -->