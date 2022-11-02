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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-banner/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-banner')}}" enctype="multipart/form-data">

                @endif

                    @csrf

                     

                     <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Type *</label> 

                            <select name="type" class="form-control">

                                <option value="">Please Select</option>

                                @foreach(GetOptionsByName('Banner/Sliders') as $D)

                                    <option value="{{$D->option}}" @if($id) @if($D->option == $data->type) selected @endif @endif>{{$D->option}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>



                      <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Title *</label> <input id="form_name" type="text" name="title" @if($id) value="{{$data->title}}" @else value="{{old('title')}}" @endif class="form-control" placeholder="Please enter title *" required="required" > </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">शीर्षक </label> <input id="form_name" type="text" name="title_h" @if($id) value="{{$data->title_h}}" @else value="{{old('title_h')}}" @endif class="form-control" placeholder="Please enter name in hindi *"  > </div>

                    </div>



                   

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Short Description </label> <input id="form_name" type="text" name="short" @if($id) value="{{$data->short}}" @else value="{{old('short')}}" @endif class="form-control" placeholder="Please enter short description "  > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> संक्षिप्त वर्णन </label> <input id="form_name" type="text" name="short_h" @if($id) value="{{$data->short_h}}" @else value="{{old('short_h')}}" @endif class="form-control" placeholder="Please enter short description in hindi "  > </div>

                    </div>



                     



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> URL   <input type="checkbox" value="yes" name="external" @if($data->external=='yes') checked @endif style="margin-left:50px;" id="checkbox"> &nbsp;External URL Link ?</label> <input  type="text" name="url" @if($id) value="{{$data->url}}"  @else value="{{old('url')}}" @endif class="form-control" id="url" placeholder="Please enter full url; example https://www.example.com " readonly> </div>

                    </div>


                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Image * [Height:470px for banners]</label> 
                            <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span>
                            <input id="form_name" type="file" name="image" @if($id) value="{{$data->image}}" @endif class="form-control" > </div>

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

            CKEDITOR.replace('description');

            CKEDITOR.replace('description_h');

            $("#checkbox").on('change',function(){
                 if($("#checkbox").is(':checked')){
                    $("#url").prop('readonly', false);
                 }
                 else{
                    $("#url").prop('readonly', true);
                 }
            });

        </script>

       @endsection