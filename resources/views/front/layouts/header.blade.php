<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <?php 
        $data = DB::table('settings_data')->where('_key','front')->first();
    ?>
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('resident.index')}}" class="logo d-flex align-items-center desktop_logo">
        <img src="{{ asset('all_image/'.$data->image) }}" alt="">
      </a>
    
      <a href="account_resident.html" class="mobile_logo">
        <img src="{{ asset('all_image'.$data->image) }}" class="img-fluid" alt="logo">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center language">
        <li>
          <select class="form Langchange" aria-label="Default select example">
            <!-- <option selected>English</option> -->
            
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
            <!-- <option value="ch" {{ session()->get('locale') == 'ch' ? 'selected' : '' }}>TS-Chinese</option>
            <option value="sc" {{ session()->get('locale') == 'sc' ? 'selected' : '' }}>SM-Chinese</option> -->
          
        </li>
          </select>
        </li>
        <span>|</span>
        <li>

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                Logout
            </a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          {{-- <a href="#">
            <span>Logout</span>
          </a> --}}
        </li>
      </ul>
    </nav>

  </header>