<!-- new about us start -->    
<section class="pb-30 pt-30">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            @if(GetOrganisationDetails('about')) 
            <div class="about-content" style="text-align:justify;">
               <h2 class="title-heading">{{ trans('messages.AboutUs')}}</h2>
                           
                      <?php if(GetLang()=='en'){$txt=GetOrganisationDetails('about');}else{$txt=GetOrganisationDetails('about_h');} echo \Illuminate\Support\Str::limit($txt, 800, $end='...');?>   
                       <a class="read-more-btn" href="{{url('about-us')}}" style="float:right;">{{ trans('messages.ReadMore')}}</a>               
                    

                                  
            </div>
             @endif 
         </div>
         
         <div class="col-lg-4">
            @if(count(GetAnnouncements('Notifications')) > 0)
            <h2 class="title-heading">{{ trans('messages.Notification')}}</h2>
            <div class="notification-list">
               @foreach(GetAnnouncements('Notifications') as $Notif)     
                     <a href="{{url('notification/'.$Notif->slug)}}">       
                           @if(GetLang()=='en')                       
                   <p><i class="fas fa-bell"></i> {{strip_tags($Notif->title)}} </p>
                   @else                         
                   <p><i class="fas fa-bell"></i>  {{strip_tags($Notif->title_h)}} </p>
               @endif  
                     </a>
                   @endforeach                                          
            </div>
             @endif
         </div>
        
      </div>
   </div>
</section>
<!-- new about us end -->