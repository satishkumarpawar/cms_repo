@extends('admin.Layout.master')
@section('title', 'Manage Menus ')
@section('content')
<style type="text/css">
  .td-list p:last-child {
    border-right: none!important;
  }
</style>
      <div class="main-panel">
        <div class="content-wrapper">
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
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="top-menu-button">
                  <p class="card-title">Manage Menus </p>
                  <div>
                      <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add-edit-menu')}}">Add New Menu </a></button>
                     <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add-edit-sub-menu')}}">Add New Sub Menu </a></button>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>S.No#</th>
                       
                           
                              <th>Main Menu</th>
                            
                              <th>Sub menu</th>
                            
                          
                            </tr>
                          </thead>
                          <tbody>
                            @foreach(GetMenu() as $K=>$D)
                            <tr>
                              <td>{{$K+1}}</td>
                           
                            
                              <td style="width:200px;">{{$D->name}}<a href="{{url('Accounts/menu-status-change/menu/'.dEncrypt($D->id).'/'.$D->status)}}" style="    background: @if($D->status==0 )red @else green @endif; position: relative; top: -9px; font-size: 11px; color: #fff; padding: 2px;  border-radius: 10px;" > @if($D->status==1) Active @else Inactive @endif</a> <span> <a href="{{url('Accounts/add-edit-menu/'.dEncrypt($D->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a></span></td>
                           
                              <td style="display: flex; flex-wrap: wrap;" class="td-list">
                                @foreach($D->GetSubMenus as $sm)
                                  <p style="margin-right:10px;border-right: 2px solid;padding-right: 5px;">
                                   {{$sm->name}}
                                   <a href="{{url('Accounts/menu-status-change/sub-menu/'.dEncrypt($sm->id).'/'.$sm->status)}}" style="    background: @if($sm->status==0 )red @else green @endif; position: relative; top: -9px; font-size: 11px; color: #fff; padding: 2px;  border-radius: 10px;" > @if($sm->status==1) Active @else Inactive @endif</a>
                                    <a href="{{url('Accounts/add-edit-sub-menu/'.dEncrypt($sm->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a>  
                                 </p> 
                                  @endforeach
                              </td>
                           
                         
                              
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
    
       @endsection

