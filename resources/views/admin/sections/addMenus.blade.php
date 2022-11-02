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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-menu/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-menu')}}" enctype="multipart/form-data">

                @endif

                    @csrf

                     



                      <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Name *</label> <input id="form_name" type="text" name="name" @if($id) value="{{$data->name}}" @else value="{{old('name')}}" @endif class="form-control" placeholder="Please enter name *" required="required" > </div>

                    </div>



                        <div class="col-md-6">

                        <div class="form-group"> <label for="form_name">Name[Hindi] *</label> <input id="form_name" type="text" name="name_h" @if($id) value="{{$data->name_h}}" @else value="{{old('name_h')}}" @endif class="form-control" placeholder="Please enter name_h *"  > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> URL   <input type="checkbox" value="yes" name="external" @if($data->external=='yes') checked @endif style="margin-left:50px;" id="checkbox"> &nbsp;External URL Link ?</label> 
                            <input  type="text" name="url1" @if($id) value="{{$data->url}}"  @else value="{{old('url1')}}" @endif class="form-control" id="url_ext" placeholder="Please enter full url; example https://www.example.com " @if($data->external=='yes') style="display:block;" @else style="display:none;" @endif> 

                            <select name="url" id="url" class="form-control"  @if($data->external=='yes') style="display:none;" @else style="display:block;" @endif>
                                <option value="">Please Select</option>
                                <option value="{{url('/')}}" @if($id) @if($data->url == url('/')) selected @endif @endif> No URL</option>
                                @foreach($data2 as $D)
                                  <option value="{{$D->url}}" @if($id) @if($D->url == $data->url) selected @endif @endif>{{url($D->url)}}</option>
                                @endforeach
                            </select>
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

          
            $("#checkbox").on('change',function(){
                 if($("#checkbox").is(':checked')){
                    $("#url").hide();
                    $("#url_ext").show();
                 }
                 else{
                    $("#url").show();
                    $("#url_ext").hide();
                 }
            });

        </script>

       @endsection