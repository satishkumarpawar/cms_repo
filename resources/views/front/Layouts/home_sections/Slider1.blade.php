  <!-- slider-area-start -->

@if(count(FindBanners('Banner')) > 0 )

     <div id="demo" class="carousel slide" data-ride="carousel">



      <ul class="carousel-indicators">



        <li data-target="#demo" data-slide-to="0" class="active"></li>



        <li data-target="#demo" data-slide-to="1"></li>



        <li data-target="#demo" data-slide-to="2"></li>



      </ul>



      <div class="carousel-inner">



         @foreach(FindBanners('Banner') as $K=>$B)


        <div class="carousel-item @if($K==0) active @endif">



          <img src="{{asset('uploads/'.$B->image)}}" alt="banner" width="1100" height="500">



          <div class="carousel-caption">



            <h3>@if(GetLang()=='en') {{$B->title}} @else {{$B->title_h}}  @endif</h3>



            <p>@if(GetLang()=='en') {{$B->short}} @else {{$B->short_h}}  @endif </p>



          </div>  



        </div>



           @endforeach



        



      </div>



      <a class="carousel-control-prev" href="#demo" data-slide="prev">



        <span class="carousel-control-prev-icon"></span>



      </a>



      <a class="carousel-control-next" href="#demo" data-slide="next">



        <span class="carousel-control-next-icon"></span>



      </a>



    </div>

@endif
