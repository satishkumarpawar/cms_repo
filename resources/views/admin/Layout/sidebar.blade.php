

    

      <nav class="sidebar sidebar-offcanvas" id="sidebar">

        <ul class="nav">

          <li class="nav-item">

            <a class="nav-link" href="{{route('admin.dashboard')}}">

              <i class="icon-grid menu-icon"></i>

              <span class="menu-title">Dashboard</span>

            </a>

          </li>



          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">

              <i class="icon-head menu-icon"></i>

              <span class="menu-title">User Management</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="auth">

              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('admin.manageadmin')}}">  Manage Users </a></li>

                <li class="nav-item"> <a class="nav-link" href="{{route('admin.roles')}}"> Manage Roles </a></li>

              </ul>

            </div>

          </li>



          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">

              <i class="icon-contract menu-icon"></i>

              <span class="menu-title">Manage Masters</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="master">

              <ul class="nav flex-column sub-menu">

                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.sitesetting')}}">Site Setting</a></li>

                   <li class="nav-item"> <a class="nav-link" href="{{route('admin.optionsmaster')}}">Options Master</a></li>

                 <li class="nav-item"><a class="nav-link" href="{{route('admin.organisation')}}">Organisation Details</a></li>

                

                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.filetourl')}}">File2Url</a></li>

              </ul>

            </div>

          </li>

  @if(\Auth::guard('admin')->user()->id==1) 

          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">

              <i class="icon-layout menu-icon"></i>

              <span class="menu-title">Layout Management</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="ui-basic">

              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="{{route('admin.topbar')}}">Manage Headers</a></li>

            

                <li class="nav-item"> <a class="nav-link" href="{{route('admin.footer')}}">Manage Footer</a></li>

               



                <li class="nav-item"> <a class="nav-link" href="{{route('admin.homeslider')}}">Manage Section1 {Home} </a></li>



                <li class="nav-item"> <a class="nav-link" href="{{route('admin.homeabout')}}">Manage Section2 {Home} </a></li>



                <li class="nav-item"> <a class="nav-link" href="{{route('admin.usps')}}">Manage Section3 {Home} </a></li>



                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.upcoming')}}">Manage Section4 {Home} </a></li>



                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.homegallery')}}">Manage Section5 {Home} </a></li>

                

              </ul>

            </div>

          </li>

@endif

         <!--     <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#sitesetting" aria-expanded="false" aria-controls="sitesetting">

              <i class="icon-columns menu-icon"></i>

              <span class="menu-title">Site Settings</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="sitesetting">

              <ul class="nav flex-column sub-menu">

                

               

              </ul>

            </div>

          </li>-->



          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#sections" aria-expanded="false" aria-controls="sections">

               <i class="icon-bar-graph menu-icon"></i>

              <span class="menu-title">Manage Sections</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="sections">

              <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{route('admin.menusetting')}}">Manage Menus </a></li>

                 <li class="nav-item"><a class="nav-link" href="{{route('admin.people')}}">Organisation Structure</a></li>

                <li class="nav-item"><a class="nav-link" href="{{route('admin.banners')}}">Banner/Sliders</a></li>

                <li class="nav-item"><a class="nav-link" href="{{route('admin.announcements')}}">Manage Announcements</a></li>

               <li class="nav-item"><a class="nav-link" href="{{route('admin.usp')}}">Manage USPs</a></li>

               <li class="nav-item"><a class="nav-link" href="{{route('admin.quicklink')}}">Manage Quick Links</a></li>

               <li class="nav-item"><a class="nav-link" href="{{url('/Accounts/dynamic-form')}}">Dynamic Forms</a></li>



              </ul>

            </div>

          </li>



      



          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">

              <i class="icon-grid-2 menu-icon"></i>

              <span class="menu-title">Tables</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="tables">

              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>

              </ul>

            </div>

          </li>

       

        

          <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">

              <i class="icon-ban menu-icon"></i>

              <span class="menu-title">Error pages</span>

              <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="error">

              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>

                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>

              </ul>

            </div>

          </li>



          <li class="nav-item">

            <a class="nav-link" href="pages/documentation/documentation.html">

              <i class="icon-paper menu-icon"></i>

              <span class="menu-title">Documentation</span>

            </a>

          </li>

        </ul>

      </nav>

      <!-- partial -->