@extends('admin.Layout.master')
@section('title', $title)
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>
                  <p class="card-description">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('error'))
                     <div class="alert alert-danger col-md-12 text-center">
                  <strong>Oops!</strong> {{ Session::get('error') }}
                </div>
                 @endif 
                  </p>
                @if($id)
                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-org/'.$id)}}" enctype="multipart/form-data">
                @else
                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-org')}}" enctype="multipart/form-data">
                @endif
                    @csrf
                     

                      <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">Company Name *</label> <input id="form_name" type="text" name="name" @if($id) value="{{$data->name}}" @else value="{{old('name')}}" @endif class="form-control" placeholder="Please enter name *" required="required" > </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">कंपनी नाम *</label> <input id="form_name" type="text" name="name_h" @if($id) value="{{$data->name_h}}" @else value="{{old('name_h')}}" @endif class="form-control" placeholder="Please enter name in hindi *"  > </div>
                    </div>

                   
                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Address *</label> <input id="form_name" type="text" name="address" @if($id) value="{{$data->address}}" @ value="{{old('address')}}" @endif class="form-control" placeholder="Please enter address *" required="required" > </div>
                    </div>

                     <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> पता *</label> <input id="form_name" type="text" name="address_h" @if($id) value="{{$data->address_h}}" @else value="{{old('address_h')}}" @endif class="form-control" placeholder="Please enter address in hindi *"  > </div>
                    </div>

                     

                     <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Contact No *</label> <input id="form_name" type="text" name="contact" @if($id) value="{{$data->contact}}" @else value="{{old('contact')}}" @endif maxlength="10" class="form-control" placeholder="Please enter contact no *" required="required" > </div>
                    </div>

                 

                     <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Email *</label> <input id="form_name" type="email" name="email" @if($id) value="{{$data->email}}" @else value="{{old('email')}}"  @endif class="form-control" placeholder="Please enter email *" required="required" > </div>
                    </div>

                    <div class="col-md-6"> 
                        <div class="form-group"> <label for="form_name"> Logo * [Size:Max_Height:130px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->logo}}] @endif</span>
                            <input id="form_name" type="file" name="logo" @if($id) value="{{$data->logo}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png"> </div>
                
                    </div>

                      <div class="col-md-6"> 
                        <div class="form-group"> <label for="form_name"> Favicon * </label> <span style="color:green;font-size:12px;">@if($id) [{{$data->fevicon}}] @endif</span>
                            <input id="form_name" type="file" name="fevicon" @if($id) value="{{$data->fevicon}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png"> </div>
                    </div>

                    <div class="col-md-6"> 
                        <div class="form-group"> <label for="form_name"> Logo 2 [Supporting Logo] [Size:Max_Height:130px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->logo2}}] @endif</span>
                            <input id="form_name" type="file" name="logo2" @if($id) value="{{$data->logo2}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png"> </div>
                
                    </div>

                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label>URL for Logo2</label>
                            <input type="text" class="form-control" name="url_logo2" @if($id) value="{{$data->url_logo2}}" @else value="{{old('url_logo2')}}" @endif placeholder="enter url ie. https://example.com">
                        </div>
                    </div>

                    <div class="col-md-6"> 
                        <div class="form-group"> <label for="form_name"> Logo 3 [Supporting Logo] [Size:Max_Height:130px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->logo3}}] @endif</span>
                            <input id="form_name" type="file" name="logo3" @if($id) value="{{$data->logo3}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png"> </div>
                
                    </div>

                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label>URL for Logo3</label>
                            <input type="text" class="form-control" name="url_logo3" @if($id) value="{{$data->url_logo3}}" @else value="{{old('url_logo3')}}" @endif placeholder="enter url ie. https://example.com">
                        </div>
                    </div>                    
        
                   
                   
                      <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Location Map [Only src value]</label> <input id="form_name" type="text" name="location" @if($id) value="{{$data->location}}" @else value="{{old('location')}}" @endif class="form-control" placeholder="Please enter location map  "  > </div>
                    </div>

                     <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Facebook]</label> <input id="form_name" type="text" name="facebook" @if($id) value="{{$data->facebook}}" @else value="{{old('facebook')}}" @endif class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Twitter]</label> <input id="form_name" type="text" name="twitter" @if($id) value="{{$data->twitter}}" @else value="{{old('twitter')}}" @endif class="form-control" placeholder="Please enter twitter link ie. https://example.com "  > </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [LinkedIn]</label> <input id="form_name" type="text" name="linkedin" @if($id) value="{{$data->linkedin}}" @else value="{{old('linkedin')}}" @endif class="form-control" placeholder="Please enter linkedin link ie. https://example.com "  > </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [YouTube]</label> <input id="form_name" type="text" name="youtube" @if($id) value="{{$data->youtube}}" @else value="{{old('youtube')}}" @endif class="form-control" placeholder="Please enter youtube link ie. https://example.com "  > </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Pintrest]</label> <input id="form_name" type="text" name="pintrest" @if($id) value="{{$data->pintrest}}" @else value="{{old('pintrest')}}" @endif class="form-control" placeholder="Please enter pintrest link ie. https://example.com "  > </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Instagram]</label> <input id="form_name" type="text" name="instagram" @if($id) value="{{$data->instagram}}" @else value="{{old('instagram')}}" @endif class="form-control" placeholder="Please enter instagram link ie. https://example.com "  > </div>
                    </div>

                      <div class="col-md-12">
                        <div class="form-group"> <label for="form_name"> About </label> 
                            <textarea id="about" name="about">@if($id){{$data->about}} @else {{old('about')}} @endif</textarea>
                         </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group"> <label for="form_name"> About[Hindi] </label> 
                            <textarea id="about_h" name="about_h">@if($id) {{$data->about_h}} @else {{old('about_h')}} @endif</textarea>
                         </div>
                    </div>


                     
                    <div class="clearfix"></div>
                   <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                   </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <script type="text/javascript">
            CKEDITOR.replace('about');
            CKEDITOR.replace('about_h');
        </script>
       @endsection