<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.home')}}" class="nav-link">Dashboard</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item dropdown">
        <select class="form-control Langchange">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
            <option value="ch" {{ session()->get('locale') == 'ch' ? 'selected' : '' }}>TS-Chinese</option>
            <option value="sc" {{ session()->get('locale') == 'sc' ? 'selected' : '' }}>SM-Chinese</option>
          </select>
        </li>

      


      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          
            <b>Super Admin</b> 
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
         
          <div class="dropdown-divider"></div>

          <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <i class="fas fa-users mr-2"></i>Logout
            </a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

         
          <div class="dropdown-divider"></div>
        
         
        </div>
      </li>



    
    </ul>
  </nav>
  <!-- /.navbar -->