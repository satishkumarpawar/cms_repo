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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-announcements/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-announcements')}}" enctype="multipart/form-data">

                @endif

                    @csrf



                    

                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Type *</label> 

                            <select name="type" class="form-control">

                                <option value="">Please Select</option>

                                @foreach(GetOptionsByName('Announcements') as $D)

                                    <option value="{{$D->option}}" @if($id) @if($D->option == $data->type) selected @endif @endif>{{$D->option}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Start Date </label> 

                            <input type="date" name="start_date" @if($id) value="{{$data->start_date}}" @else value="{{old('start_date')}}" @endif  class="form-control">

                        </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> End Date </label> 

                              <input type="date" name="end_date" @if($id) value="{{$data->end_date}}" @else value="{{old('end_date')}}" @endif class="form-control">

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Title * </label> 

                              <input type="text" name="title" @if($id) value="{{$data->title}}" @else value="{{old('title')}}" @endif class="form-control" required>

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> शीर्षक  </label> 

                              <input type="text" name="title_h" @if($id) value="{{$data->title_h}}" @else value="{{old('title_h')}}" @endif class="form-control">

                        </div>

                    </div>

                   

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Image  </label> 
                            <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span>
                              <input type="file" name="image"  class="form-control">

                        </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Document  </label> 
                            <span style="color:green;font-size:12px;"> @if($id) [{{$data->document}}] @endif</span>
                              <input type="file" name="document"  class="form-control">

                        </div>

                    </div>



                     <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Description * </label> 

                              <textarea name="description" id="description">@if($id) {{$data->description}} @else {{old('description')}} @endif</textarea>

                        </div>

                    </div>



                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> विवरण  </label> 

                              <textarea name="description_h" id="description_h" >@if($id) {{$data->description_h}} @else {{old('description_h')}} @endif</textarea>

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

 CKEDITOR.replace('description');

 CKEDITOR.replace('description_h');

</script>



 @endsection

