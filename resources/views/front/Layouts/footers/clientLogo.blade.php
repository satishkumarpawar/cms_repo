<!-- brands-area-start -->
    <div class="brands-area pt-3 pb-3">
        <div class="container">
            <div class="brand-carousel owl-carousel">
                @foreach(FindBanners('Client Logos') as $CL)
                <div class="single-brand">
                    <a href="{{$CL->url}}" target="_new">
                    <img src="{{asset('uploads/'.$CL->image)}}" alt="{{$CL->title}}">
                    </a>
                </div>
           
                @endforeach
            </div>
        </div>
    </div>
    <!-- brands-area-end -->