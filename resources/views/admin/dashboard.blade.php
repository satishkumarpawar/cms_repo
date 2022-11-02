@extends('admin.Layout.master')
@section('title', $title)
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
             @if(Session::has('success'))
              <div class="alert alert-success col-md-12 text-center">
                  <strong>Success!</strong> {{ Session::get('success') }}
                </div>
                 @endif
                @if(Session::has('error'))
              <div class="alert alert-danger col-md-12 text-center">
                  <strong>Oops!</strong> {{ Session::get('error') }}
                </div>
                 @endif
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-7 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{\Auth::guard('admin')->user()->name}}</h3>
                
                </div>
                <div class="col-12 col-xl-5">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white " type="button" id="dropdownMenuDate2" >
                     <i class="mdi mdi-calendar"></i> Last Login: <b>{{\Auth::guard('admin')->user()->last_login_time}}</b>, From IP: <b>{{\Auth::guard('admin')->user()->ip}}</b>
                    </button>
                    
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          
       
         
        
     <!--      <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Recent Log</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>Quote#</th>
                              <th>Product</th>
                              <th>Business type</th>
                              <th>Policy holder</th>
                              <th>Premium</th>
                              <th>Status</th>
                              <th>Updated at</th>
                              <th></th>
                            </tr>
                          </thead>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div> -->
        </div>
        <!-- content-wrapper ends -->
       @endsection