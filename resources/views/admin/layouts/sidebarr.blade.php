
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <a href="{{ route('admin.home')}}" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Booking</span>
    </a>

    
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
            <li class="nav-item">
              <a href="{{ route('tower.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Tower</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('floar.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Floar</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('unit.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Unit</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('setting.index') }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Setting</p>
              </a>
            </li>

            
        </ul>
      </nav>
    </div>
    
  </aside>
