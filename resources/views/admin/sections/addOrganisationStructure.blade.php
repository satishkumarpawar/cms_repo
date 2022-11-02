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

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-people/'.$id)}}" enctype="multipart/form-data">

                @else

                  <form class="forms-sample row col-md-12" method="POST" action="{{url('Accounts/add-edit-people')}}" enctype="multipart/form-data">

                @endif

                    @csrf

                     <div class="col-md-12">

                        <div class="form-group">

                            <label for="form_name"> Type *</label>

                            <select name="type" class="form-control">

                                <option value="">Please Select</option>

                                @foreach(GetOptionsByName('Organisation Structure') as $X)

                                    <option value="{{$X->Option}}" @if($id) @if($X->Option == $data->type) selected @endif @endif>{{$X->option}}</option>

                                @endforeach

                            </select>

                        </div>

                    </div>



                      <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Name *</label> <input id="form_name" type="text" name="title" @if($id) value="{{$data->title}}" @else value="{{old('title')}}" @endif class="form-control" placeholder="Please enter name *" required="required" > </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> नाम *</label> <input id="form_name" type="text" name="title_h" @if($id) value="{{$data->title_h}}" @else value="{{old('title_h')}}" @endif class="form-control" placeholder="Please enter name in hindi *"  > </div>

                    </div>



                   

                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Designation *</label> <input id="form_name" type="text" name="designation" @if($id) value="{{$data->designation}}" @else value="{{old('designation')}}" @endif class="form-control" placeholder="Please enter designation *" required="required" > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> पद *</label> <input id="form_name" type="text" name="designation_h" @if($id) value="{{$data->designation_h}}" @else value="{{old('designation_h')}}" @endif class="form-control" placeholder="Please enter designation in hindi *" > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Department *</label> <input id="form_name" type="text" name="department" @if($id) value="{{$data->department}}" @else value="{{old('department')}}" @endif class="form-control" placeholder="Please enter department *" > </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> विभाग </label> <input id="form_name" type="text" name="department_h" @if($id) value="{{$data->department_h}}" @else value="{{old('department_h')}}" @endif class="form-control" placeholder="Please enter department *" > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Contact No *</label> <input id="form_name" type="text" name="phone" @if($id) value="{{$data->phone}}" @else value="{{old('phone')}}" @endif maxlength="10" class="form-control" placeholder="Please enter contact no *" required="required" > </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Extension </label> <input id="form_name" type="text" name="extension" @if($id) value="{{$data->extension}}" @else value="{{old('extension')}}" @endif class="form-control" placeholder="Please enter extension *"  > </div>

                    </div>



                     <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Email *</label> <input id="form_name" type="email" name="email" @if($id) value="{{$data->email}}" @else value="{{old('email')}}" @endif class="form-control" placeholder="Please enter email *" required="required" > </div>

                    </div>



                    <div class="col-md-6">

                        <div class="form-group"> <label for="form_name"> Image *</label> <span style="color:green;font-size:12px;"> @if($id) [{{$data->image}}] @endif</span>

                         <input id="form_name" type="file" name="image" @if($id) value="{{$data->image}}" @endif class="form-control" > </div>

                    </div>



                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> Description </label> <textarea name="description" id="description">@if($id){{$data->description}} @else {{old('description')}} @endif</textarea> </div>

                    </div>





                    <div class="col-md-12">

                        <div class="form-group"> <label for="form_name"> विवरण </label> <textarea name="description_h" id="description_h">@if($id) {{$data->description_h}} @else {{old('description_h')}} @endif</textarea> </div>

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