


<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item @if(session::get('page')=='dashboard') background_active @endif">
          
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="icon-grid menu-icon @if(session::get('page')=='dashboard') dashboard_icon @endif"></i>
              <span class="menu-title @if(session::get('page')=='dashboard') dashboard_icon @endif">Dashboard</span>
            </a>
          </li>
          @if(Auth::guard('admin')->user()->type=="vendor")
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#vendor_details" aria-expanded="false" aria-controls="vendor_details">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Vendor Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="vendor_details">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{url('admin/update-vendor-details/personal')}}" class="nav-link" href="pages/ui-features/buttons.html">Personal Detials</a></li>
                <li class="nav-item"> <a  href="{{url('admin/update-vendor-details/business')}}" class="nav-link" href="pages/ui-features/dropdowns.html">Business Details</a></li>
                <li class="nav-item"> <a  href="{{url('admin/update-vendor-details/bank')}}" class="nav-link" href="pages/ui-features/dropdowns.html">Bank Details</a></li>

              </ul>
            </div>
          </li>
          @else
          <li class="nav-item @if(session::get('page')=='setting') background_active @endif">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
              <i class="icon-layout menu-icon @if(session::get('page')=='setting') dashboard_icon @endif"></i>
              <span class="menu-title @if(session::get('page')=='setting') dashboard_icon @endif">Settings</span>
              <i class="menu-arrow @if(session::get('page')=='setting') dashboard_icon @endif"></i>
            </a>
            <div class="collapse " id="settings">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{url('admin/update-admin-password')}}" class="nav-link" >Update Password</a></li>
                <li class="nav-item"> <a  href="{{url('admin/update-admin-details')}}" class="nav-link" >Update Details</a></li>

              </ul>
            </div>
          </li>
          <!-- super admin -->
          <!-- Admin management -->
          <li class="nav-item @if(session::get('page')=='admindetails') background_active @endif">
            <a class="nav-link" data-toggle="collapse" href="#admin_management" aria-expanded="false" aria-controls="admin_management">
              <i class="icon-layout menu-icon @if(session::get('page')=='admindetails') dashboard_icon @endif"></i>
              <span class="menu-title @if(session::get('page')=='admindetails') dashboard_icon @endif">Admin Management</span>
              <i class="menu-arrow @if(session::get('page')=='admindetails') dashboard_icon @endif"></i>
            </a>
            <div class="collapse" id="admin_management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{url('admin/admins/admin')}}" class="nav-link" >Admins</a></li>
                <li class="nav-item"> <a  href="{{url('admin/admins/subadmin')}}" class="nav-link" >SubAdmins</a></li>
                <li class="nav-item"> <a  href="{{url('admin/admins/vendor')}}" class="nav-link" >Vendors</a></li>
                <li class="nav-item"> <a  href="{{url('admin/admins/')}}" class="nav-link" >All</a></li>
              </ul>
            </div>
          </li>
          <!-- end admin management -->
          <!-- catalouge management -->
          <li class="nav-item @if(session::get('page')=='catalouge') background_active @endif">
            <a class="nav-link" data-toggle="collapse" href="#catalouge_management" aria-expanded="false" aria-controls="catalouge_management">
              <i class="icon-layout menu-icon @if(session::get('page')=='catalouge') dashboard_icon @endif"></i>
              <span class="menu-title @if(session::get('page')=='catalouge') dashboard_icon @endif">Cata Management</span>
              <i class="menu-arrow @if(session::get('page')=='catalouge') dashboard_icon @endif"></i>
            </a>
            <div class="collapse" id="catalouge_management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{url('admin/sections')}}" class="nav-link" >Sections</a></li>
                <li class="nav-item"> <a href="{{url('admin/category')}}" class="nav-link" >Category</a></li>
                <li class="nav-item"> <a href="{{url('admin/brands')}}" class="nav-link" >Brands</a></li>
                <li class="nav-item"> <a  href="{{url('admin/products')}}" class="nav-link" >Products</a></li>
                
              </ul>
            </div>
          </li>
          <!-- end catalouge management -->
          <!-- user management -->
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#user_management" aria-expanded="false" aria-controls="user_management">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">User Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user_management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{url('admin/users')}}" class="nav-link" >Users</a></li>
                <li class="nav-item"> <a  href="{{url('admin/subscribers')}}" class="nav-link" >Subscribers</a></li>
                
              </ul>
            </div>
          </li>
          <!-- end user management -->
          <!-- Banner management -->
          <li class="nav-item  @if(session::get('page')=='banner') background_active @endif">
            <a class="nav-link" data-toggle="collapse" href="#banner_management" aria-expanded="false" aria-controls="banner_management">
              <i class="icon-layout menu-icon  @if(session::get('page')=='banner') dashboard_icon @endif"></i>
              <span class="menu-title @if(session::get('page')=='banner') dashboard_icon @endif">Banner Management</span>
              <i class="menu-arrow @if(session::get('page')=='banner') dashboard_icon @endif"></i>
            </a>
            <div class="collapse" id="banner_management">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a href="{{url('admin/banners')}}" class="nav-link" >Home page Banners</a></li>
                <!-- <li class="nav-item"> <a  href="{{url('admin/subscribers')}}" class="nav-link" >Subscribers</a></li> -->
                
              </ul>
            </div>
          </li>
          <!-- end Banner management -->
          @endif
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
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
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
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