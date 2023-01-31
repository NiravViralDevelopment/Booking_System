 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">
    <?php 
        $data = DB::table('settings_data')->where('_key','front')->first();
    ?>
    <ul class="sidebar-nav" id="sidebar-nav">
      <p>{{ $data->title }}</p>
     
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-user"></i><span>Account</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if(Route::currentRouteName() == 'front_profile.index') show @endif @if(Route::currentRouteName() == 'resident.index') show @endif @if(Route::currentRouteName() == 'resident.create') show @endif  @if(Route::currentRouteName() == 'resident.edit')show @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('resident.index')}}" class="@if(Route::currentRouteName() == 'resident.index') active @endif @if(Route::currentRouteName() == 'resident.create') active @endif  @if(Route::currentRouteName() == 'resident.edit')active @endif">
              <span>Resident</span>
            </a>
          </li>
          <li>
            <a href="{{ route('front_profile.index')}}" class="@if(Route::currentRouteName() == 'front_profile.index') active @endif">
              <span>My Password</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-file-text-o "></i><span>Content</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse @if(Route::currentRouteName() == 'facility.index') show @endif @if(Route::currentRouteName() == 'facility.create') show @endif  @if(Route::currentRouteName() == 'facility.edit') show @endif
        @if(Route::currentRouteName() == 'quota_by_unit.index') show @endif"
        
         data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('facility.index')}}" class="@if(Route::currentRouteName() == 'facility.index') active @endif @if(Route::currentRouteName() == 'facility.create') active @endif  @if(Route::currentRouteName() == 'facility.edit')active @endif">
              <span>Facility</span>
            </a>
          </li>
          <li>
            <a href="{{ route('quota_by_unit.index')}}" class="@if(Route::currentRouteName() == 'quota_by_unit.index') active @endif">
              <span>Quota by Unit</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="fa fa-calendar-check-o"></i></i><span>Log</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse @if(Route::currentRouteName() == 'logcalender.index') show @endif @if(Route::currentRouteName() == 'tack_attendance.index') show @endif @if(Route::currentRouteName() == 'record.index') show @endif @if(Route::currentRouteName() == 'report.index') show @endif @if(Route::currentRouteName() == 'Booking_reports') show @endif" data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="{{ route('logcalender.index')}}" class="@if(Route::currentRouteName() == 'logcalender.index') active @endif">
              <span>Calender</span>
            </a>
          </li>
          <li>
            <a href="{{ route('tack_attendance.index')}}" class="@if(Route::currentRouteName() == 'tack_attendance.index') active @endif">
              <span>Take Attendance</span>
            </a>
          </li>
          <li>
            <a href="{{ route('record.index')}}" class="@if(Route::currentRouteName() == 'record.index') active @endif">
              <span>Record</span>
            </a>
          </li>
          <!-- <li>
            <a href="{{ route('report.index')}}">
              <span>Report</span>
            </a>
          </li> -->

          <li>
            <a href="{{ route('report.index')}}" class="@if(Route::currentRouteName() == 'report.index') active @endif">
              <span>Attendance Report</span>
            </a>
          </li>

          <li>
            <a href="{{ route('Booking_reports')}}" class="@if(Route::currentRouteName() == 'Booking_reports') active @endif">
              <span>Booking Report</span>
            </a>
          </li>

          
        </ul>
      </li><!-- End Tables Nav -->

    </ul>

  </aside><!-- End Sidebar-->