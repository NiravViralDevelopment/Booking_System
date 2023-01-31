@extends('front.app_master')

@section('content')
<main id="main" class="main">

<div class="row">
  <div class="col-sm-6">
    <div class="pagetitle">
      <h1>Quota by Unit</h1>
    </div>
  </div>

  <div class="col-sm-6">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="account_resident.html">Home</a></li>
        <li class="breadcrumb-item active">Quota by Unit</li>
      </ol>
    </nav>
  </div>
  
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card password_block">
        <div class="card-body">
          <h5 class="card-title">Set quota by Unit</h5>

          <form action="{{ route('quota_by_unit.store')}}" method="POST">
            @csrf
            <input type="hidden" name="quota_by_Unit_id" value="{{ $data->id}}" > 
           <div class="row">
            <div class="col-sm-12">
              <label for="active" class="form-label">Maximum facility enrollment quota per day</label>
              <select class="minimal form-select" name="facility_enrollment_quota_per_day">
                <?php 
                  for($i=0;$i<=100;$i++){
                      if($data->facility_enrollment_quota_per_day == $i){
                        ?><option selected value='{{ $i}}'>{{ $i}}</option><?php
                      }else{
                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                      }
                  }
                ?>
              </select>
            </div>

            <div class="col-sm-12 mt-3">
              <label for="active" class="form-label">Maximum session enrollment quota per day</label>
              <select class="minimal form-select" name="session_enrollment_quota_per_day">
                <?php 
                  for($i=0;$i<=100;$i++){
                      if($data->session_enrollment_quota_per_day == $i){
                        ?><option selected value='{{ $i}}'>{{ $i}}</option><?php
                      }else{
                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                      }
                  }
                ?>
              </select>
            </div>
           </div>
          

        </div>
      </div>

      <div class="card">
        <div class="card-body mt-2">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>

    </div>
    </form>

  </div>
</section>

</main><!-- End #main -->

@endsection