@extends('front.app_master')

@section('content')
<main id="main" class="main">

    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>My Password</h1>
        </div>
      </div>
    
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="account_resident.html">Home</a></li>
            <li class="breadcrumb-item active">My Password</li>
          </ol>
        </nav>
      </div>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card password_block">
            <div class="card-body">
              <h5 class="card-title">Change My Password</h5>

              <div class="login_info">
                <p>Logged in as:</p>
                <p class="manager_login">Manager (Login Name)</p>
              </div>

              
             
              @if($errors->has('new_password'))
                <spam class="text-danger">{{ $errors->first('new_password') }}</span>
              @endif
              
              <form action="{{ route('front_profile.store')}}" method='POST'>
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label for="oldpassword" class="form-label">Old Password</label>
                      <input type="password" class="form-control" id="oldpassword" name='old_password'>
                      @if($errors->has('old_password'))
                        <p class="text-danger">{{ $errors->first('old_password') }}</p>
                      @endif
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label for="newpassword" class="form-label">New Password</label>
                      <input type="password" class="form-control" id="newpassword" name='new_password'>
                      
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="mb-3">
                      <label for="confirmpassword" class="form-label">Confirm New Password</label>
                      <input type="password" class="form-control" id="confirmpassword" name='confirm_password'>
                    </div>
                   
                  </div>
                </div>
              

            </div>
          </div>

          <div class="card">
            <div class="card-body mt-3">
              <a href="#" class="btn btn-secondary">Cancel</a>
              <button type='submit' class="btn btn-success">Save</button>
            </div>
          </div>

        </div>
</form>
    
      </div>
    </section>

  </main><!-- End #main -->

@endsection