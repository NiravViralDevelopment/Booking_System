@extends('front.app_master')

@section('content')

<main id="main" class="main">
    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>Facility Detail</h1>
        </div>
      </div>

      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Facility</li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </nav>
      </div>
    </div>
    
    <form action="{{ route('facility.index')}}" method="POST">
      @csrf
    </div><!-- End Page Title -->

    <section class="section facility_create">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="tab_block">
                <p>Title</p>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">English</button>
                  </li>
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">繁體</button>
                  </li> -->
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">简体</button>
                  </li> -->
                  
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="title" rows="3"></textarea>
                        @if($errors->has('title'))
                          <span class='text-danger'>{{ $errors->first('title') }}</span>
                        @endif
                      </div>
                    
                  </div>
                  <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <form>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <form>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </form>
                  </div> -->
                </div>
              </div>
              
              <div class="tab_block">
                <p>Content </p>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home2-tab" data-bs-toggle="pill" data-bs-target="#pills-home2" type="button" role="tab" aria-controls="pills-home2" aria-selected="true">English</button>
                  </li>
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile2-tab" data-bs-toggle="pill" data-bs-target="#pills-profile2" type="button" role="tab" aria-controls="pills-profile2" aria-selected="false">繁體</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact2-tab" data-bs-toggle="pill" data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact2" aria-selected="false">简体</button>
                  </li> -->
                  
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home2-tab" tabindex="0">
                   
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="Content" rows="3"></textarea>
                        @if($errors->has('Content'))
                          <span class='text-danger'>{{ $errors->first('Content') }}</span>
                        @endif
                      </div>
                   
                  </div>
                  <!-- <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile2-tab" tabindex="0">
                    <form>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </form>
                  </div> -->
                  <!-- <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact2-tab" tabindex="0">
                    <form>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </form>
                  </div> -->
                </div>
              </div>
              
              <div class="tab_block">
                <p>Remarks </p>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home3-tab" data-bs-toggle="pill" data-bs-target="#pills-home3" type="button" role="tab" aria-controls="pills-home3" aria-selected="true">English</button>
                  </li>
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile3-tab" data-bs-toggle="pill" data-bs-target="#pills-profile3" type="button" role="tab" aria-controls="pills-profile3" aria-selected="false">繁體</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact3-tab" data-bs-toggle="pill" data-bs-target="#pills-contact3" type="button" role="tab" aria-controls="pills-contact3" aria-selected="false">简体</button>
                  </li> -->
                  
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home3" role="tabpanel" aria-labelledby="pills-home3-tab" tabindex="0">
                   
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="Remarks" rows="3"></textarea>
                        @if($errors->has('Remarks'))
                          <span class='text-danger'>{{ $errors->first('Remarks') }}</span>
                        @endif
                      </div>
                   
                  </div>
                  <!-- <div class="tab-pane fade" id="pills-profile3" role="tabpanel" aria-labelledby="pills-profile3-tab" tabindex="0">
                    <form>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </form>
                  </div> -->
                  <!-- <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact3-tab" tabindex="0">
                    <form>
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </form>
                  </div> -->
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <p>Opening Hours (Sessions)</p>

              @if($errors->has('monday_select_hour_first'))
                <span class='text-danger'>{{ $errors->first('monday_select_hour_first') }}</span>
              @endif

              
              <div class="resident_create_accordion">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfacility1">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefacility1"
                        aria-expanded="true" aria-controls="collapsefacility1">
                        <i class="fa fa-angle-down"></i>
                        <span> Monday</span>
                      </button>
                    </h2>
                    <div id="collapsefacility1" class="accordion-collapse collapse show" aria-labelledby="headingfacility1"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                       
                          <div class="add_session_block">
                            <div class="row">
                              <div class="col-sm-10">
                              <div class="row align-items-center">
                              <div class="col-sm-2">
                                <select class="minimal form-select" name='monday_select_hour_first[0]'>
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                  
                                 
                                </select>
                                
                                
                              </div>
                              <div class="text-center p-0 clock_text">
                               <span>:</span> 
                              </div>

  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name='monday_select_minutes_first[0]'>
                                  <?php 
                                    for($i=0;$i<=59;$i++){
                                      if($i<10){
                                          ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                      }else{
                                          ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                      }
                                    }
                                  ?>
                                  
                                </select>
                              </div>
                              <div class="text-center p-0 clock_text">
                               <span>-</span> 
                              </div>

                              <div class="col-sm-2">
                                <select class="minimal form-select" name='monday_select_hour_third[0]'>
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
                              <div class="text-center p-0 clock_text">
                               <span>:</span> 
                              </div>

  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name='monday_select_hour_four[0]'>
                                <?php 
                                    for($i=0;$i<=59;$i++){
                                      if($i<10){
                                          ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                      }else{
                                          ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                      }
                                    }
                                  ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2 col-md-4 col-lg-3">
                                <div class="add_session">
                                  <i class="fa fa-plus text-success me-1"></i><a href="javascript:void(0)" class="text-success add_monday_column_plus">Add Session</a>
                                </div>
                              </div>
                            </div>  
                              </div>
                            </div>
                              
                          </div>
                        
                          <div class='add_monday_column'></div>
                        
                       
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfacility2">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefacility2"
                        aria-expanded="true" aria-controls="collapsefacility2">
                        <i class="fa fa-angle-down"></i>
                        <span> Tuesday</span>
                      </button>
                    </h2>
                    <div id="collapsefacility2" class="accordion-collapse collapse" aria-labelledby="headingfacility2"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                       
                          <div class="add_session_block">
                            <div class="row align-items-center">
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Tuesday_select_hour_first[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                                
                              </div>
                              <div class="text-center p-0 clock_text">
                               <span>:</span> 
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Tuesday_select_minutes_first[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
                              <div class="text-center p-0 clock_text">
                               <span>-</span> 
                              </div>
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Tuesday_select_hour_third[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
                              <div class="text-center p-0 clock_text">
                               <span>:</span> 
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Tuesday_select_hour_four[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2 col-md-4 col-lg-3">
                                <div class="add_session">
                                  <i class="fa fa-plus text-success me-1"></i><a href="javascript:void(0)" class="text-success add_Tuesday_column_plus">Add Session</a>
                                </div>
                              </div>
                            </div>    
                          </div>
                          
                          <div class='add_Tuesday_column'></div>    

                       
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfacility3">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefacility3"
                        aria-expanded="true" aria-controls="collapsefacility3">
                        <i class="fa fa-angle-down"></i>
                        <span> Wednesday</span>
                      </button>
                    </h2>
                    <div id="collapsefacility3" class="accordion-collapse collapse" aria-labelledby="headingfacility3"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        
                          <div class="add_session_block">
                            <div class="row align-items-center">
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Wednesday_select_hour_first[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                  
                                </select>
                                
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Wednesday_select_minutes_first[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                  
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Wednesday_select_hour_third[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Wednesday_select_hour_four[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2 col-md-4 col-lg-2">
                                <div class="add_session">
                                  <i class="fa fa-plus text-success me-1"></i><a href="javascript:void(0)" class="text-success add_Wednesday_column_plus">Add Session</a>
                                </div>
                              </div>
                            </div>    
                          </div>
                          
                          <div class='add_Wednesday_column'></div>    
                        
                       
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfacility4">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefacility4"
                        aria-expanded="true" aria-controls="collapsefacility4">
                        <i class="fa fa-angle-down"></i>
                        <span> Thursday</span>
                      </button>
                    </h2>
                    <div id="collapsefacility4" class="accordion-collapse collapse" aria-labelledby="headingfacility4"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        
                          <div class="add_session_block">
                            <div class="row align-items-center">
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Thursday_select_hour_first[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                                
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Thursday_select_minutes_first[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Thursday_select_hour_third[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Thursday_select_hour_four[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2 col-md-4 col-lg-2">
                                <div class="add_session">
                                  <i class="fa fa-plus text-success me-1"></i><a href="javascript:void(0)" class="text-success add_Thursday_column_plus">Add Session</a>
                                </div>
                              </div>
                            </div>    
                          </div>

                         
                          
                          <div class='add_Thursday_column'></div>    
                       
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfacility5">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefacility5"
                        aria-expanded="true" aria-controls="collapsefacility5">
                        <i class="fa fa-angle-down"></i>
                        <span> Friday</span>
                      </button>
                    </h2>
                    <div id="collapsefacility5" class="accordion-collapse collapse" aria-labelledby="headingfacility5"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                       
                          <div class="add_session_block">
                            <div class="row align-items-center">
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Friday_select_hour_first[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                                
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Friday_select_minutes_first[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Friday_select_hour_third[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Friday_select_hour_four[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2 col-md-4 col-lg-2">
                                <div class="add_session">
                                  <i class="fa fa-plus text-success me-1"></i><a href="javascript:void(0)" class="text-success add_Friday_column_plus">Add Session</a>
                                </div>
                              </div>
                            </div>    
                          </div>

                          
                          <div class='add_Friday_column'></div>  
                                                
                        
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfacility6">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefacility6"
                        aria-expanded="true" aria-controls="collapsefacility6">
                        <i class="fa fa-angle-down"></i>
                        <span> Saturday</span>
                      </button>
                    </h2>
                    <div id="collapsefacility6" class="accordion-collapse collapse" aria-labelledby="headingfacility6"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                      
                          <div class="add_session_block">
                            <div class="row align-items-center">
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Saturday_select_hour_first[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                                
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Saturday_select_minutes_first[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Saturday_select_hour_third[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Saturday_select_hour_four[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2 col-md-4 col-lg-2">
                                <div class="add_session">
                                  <i class="fa fa-plus text-success me-1"></i><a href="javascript:void(0)" class="text-success add_Saturday_column_plus">Add Session</a>
                                </div>
                              </div>
                            </div>    
                          </div>

                         
                          
                          <div class='add_Saturday_column'></div>
                       
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfacility7">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefacility7"
                        aria-expanded="true" aria-controls="collapsefacility7">
                        <i class="fa fa-angle-down"></i>
                        <span> Sunday</span>
                      </button>
                    </h2>
                    <div id="collapsefacility7" class="accordion-collapse collapse" aria-labelledby="headingfacility7"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                      
                          <div class="add_session_block">
                            <div class="row align-items-center">
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Sunday_select_hour_first[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                                
                              </div>

                              
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Sunday_select_minutes_first[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Sunday_select_hour_third[0]">
                                <?php 
                                  for($i=0;$i<=23;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2">
                                <select class="minimal form-select" name="Sunday_select_hour_four[0]">
                                <?php 
                                  for($i=0;$i<=59;$i++){
                                    if($i<10){
                                        ?><option value='0{{ $i}}'>0{{ $i}}</option><?php
                                    }else{
                                        ?><option value='{{ $i}}'>{{ $i}}</option><?php
                                    }
                                  }
                                ?>
                                </select>
                              </div>
  
                              <div class="col-sm-2 col-md-4 col-lg-2">
                                <div class="add_session">
                                  <i class="fa fa-plus text-success me-1"></i><a href="javascript:void(0)" class="text-success add_Sunday_column_plus">Add Session</a>
                                </div>
                              </div>
                            </div>    
                          </div>

                          
                          <div class='add_Sunday_column'></div>
                                                
                       
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
           
                <div class="row">
                  <div class="col-sm-6">
                    <label for="active" class="form-label">Maximum quota per facility</label>
                    <select class="minimal form-select" name='quota_per_facility' id="quota_per_facility">
                      <?php 
                        for($i=0;$i<=100; $i+=2){
                          ?> <option value='{{ $i}}'>{{ $i}}</option><?php
                        }
                      ?>
                      
                    </select>
                  </div>

                 

                  <div class="col-sm-6">
                    <label for="active" class="form-label">Maximum quota per session</label>
                    <input type="text" class="form-control" id="quota_per_session" readonly name="quota_per_session" >
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-12">
                    <p>Status</p>
                  </div>
                  
                  <div class="col-6 col-md-4 col-lg-2">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name='status' value="1">
                      <label class="form-check-label" for="checkfacility1">Active</label>
                    </div>
                  </div>

                  <div class="col-6 col-md-4 col-2">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name='status' value="0">
                      <label class="form-check-label" for="checkfacility2">Inactive</label>
                    </div>
                  </div>
                </div>
             
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <a href="#" class="btn btn-secondary">Cancel</a>
              <button type='submit' class="btn btn-success">Save</button>  
            </div>
          </div>

        </div>
        </form>
      </div>
    </section>

  </main><!-- End #main -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function() {

    

    var index = 0;
    var index_per = 1;
      $(".add_monday_column_plus").click(function() {
        index++;
        index_per++;
        var index_per_zero_plus = index_per; 
        var devided = $('#quota_per_facility').val() / (index_per_zero_plus);
        $('#quota_per_session').val(parseInt(devided));

          $('.add_monday_column').append('<div class="dlt_session_block" id="delete_sub_form">'+
          '<div class="row align-items-center mb-3"><div class="col-sm-2"><select class="minimal form-select monday_select_hour_first" name="monday_select_hour_first['+index+']">'+
          '</select>'+
          '</div> <div class="text-center p-0 clock_text"><span>:</span></div>'+
          '<div class="col-sm-2">'+
          '<select class="minimal form-select monday_select_minutes_first" name="monday_select_minutes_first['+index+']">'+
          '</select>'+
          '</div><div class="text-center p-0 clock_text"><span>-</span></div>'+
          '<div class="col-sm-2">'+
          '<select class="minimal form-select monday_select_hour_third" name="monday_select_hour_third['+index+']">'+
          
          '</select></div><div class="text-center p-0 clock_text"><span>:</span></div>'+
          '<div class="col-sm-2">'+
          '<select class="minimal form-select monday_select_hour_four" name="monday_select_hour_four['+index+']">'+
          '<option>00</option><option>01</option><option>02</option>'+
          '</select></div>'+
          '<div class="col-sm-2 col-md-4 col-lg-3"><div class="add_session"><i class="fa fa-minus text-danger me-1"></i>'+
          '<a href="javascript:void(0)" class="text-danger monday_btn_remove">Delete Session</a>'+'</div></div></div></div>');
          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.monday_select_hour_first').append('<option>0'+i+'</option>');
            }else{
              $('.monday_select_hour_first').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.monday_select_minutes_first').append('<option>0'+i+'</option>');
            }else{
              $('.monday_select_minutes_first').append('<option>'+i+'</option>');
            }
            
          }

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.monday_select_hour_third').append('<option>0'+i+'</option>');
            }else{
              $('.monday_select_hour_third').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.monday_select_hour_four').append('<option>0'+i+'</option>');
            }else{
              $('.monday_select_hour_four').append('<option>'+i+'</option>');
            }
            
          }


      });
      
      $(document).on('click', '.monday_btn_remove', function() {
            index_per--;
            var devided = $('#quota_per_facility').val() / (index_per);
            $('#quota_per_session').val(parseInt(devided));
            $(this).closest('div#delete_sub_form').remove();
      });

      $('#quota_per_facility').on('change', function() {
          if(index_per == 0){
              $('#quota_per_facility').val('');
              alert('Please select time session monday to sunday after select this.');
          }else{
              var devided = $(this).val() / (index_per);
              $('#quota_per_session').val(parseInt(devided));
          }
      });

      

      // $('.monday_btn_remove').click('click', function() {
      //   alert('welcome');
      //     if(index_per == 0){
      //         $('#quota_per_facility').val('');
      //         alert('Please select time session monday to sunday after select this.');
      //     }else{
      //         var devided = $(this).val() / (index_per+1);
      //         $('#quota_per_session').val(parseInt(devided));
      //     }
      // });

      


    //add_Tuesday_column_plus
    var Tuesday = 0;
    $(".add_Tuesday_column_plus").click(function() {
      Tuesday++;
          $('.add_Tuesday_column').append('<div class="dlt_session_block" id="delete_sub_form"><div class="row align-items-center mb-3"><div class="col-sm-2">'+
          '<select class="minimal form-select Tuesday_select_hour_first" name="Tuesday_select_hour_first['+Tuesday+']">'+
          '</select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Tuesday_select_minutes_first" name="Tuesday_select_minutes_first['+Tuesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Tuesday_select_hour_third" name="Tuesday_select_hour_third['+Tuesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Tuesday_select_hour_four" name="Tuesday_select_hour_four['+Tuesday+']"></select></div>'+
          '<div class="col-sm-2 col-md-4 col-lg-2"><div class="add_session"><i class="fa fa-minus text-danger me-1"></i>'+
          '<a href="javascript:void(0)" class="text-danger Tuesday_column_remove">Delete Session</a>'+'</div></div></div></div>');
          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Tuesday_select_hour_first').append('<option>0'+i+'</option>');
            }else{
              $('.Tuesday_select_hour_first').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Tuesday_select_minutes_first').append('<option>0'+i+'</option>');
            }else{
              $('.Tuesday_select_minutes_first').append('<option>'+i+'</option>');
            }
            
          }

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Tuesday_select_hour_third').append('<option>0'+i+'</option>');
            }else{
              $('.Tuesday_select_hour_third').append('<option>'+i+'</option>');
            }

            
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Tuesday_select_hour_four').append('<option>0'+i+'</option>');
            }else{
              $('.Tuesday_select_hour_four').append('<option>'+i+'</option>');
            }
            
          }
      });
      $(document).on('click', '.Tuesday_column_remove', function() {
        $(this).closest('div#delete_sub_form').remove();
      });

      var Wednesday = 0;
      //add_Wednesday_column_plus
      $(".add_Wednesday_column_plus").click(function() {
        Wednesday++;
          $('.add_Wednesday_column').append('<div class="dlt_session_block" id="delete_sub_form"><div class="row align-items-center mb-3"><div class="col-sm-2"><select class="minimal form-select Wednesday_select_hour_first" name="Wednesday_select_hour_first['+Wednesday+']">'+
          '</select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Wednesday_select_minutes_first" name="Wednesday_select_minutes_first['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Wednesday_select_hour_third" name="Wednesday_select_hour_third['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Wednesday_select_hour_four" name="Wednesday_select_hour_four['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2 col-md-4 col-lg-2"><div class="add_session"><i class="fa fa-minus text-danger me-1"></i>'+
          '<a href="javascript:void(0)" class="text-danger Wednesday_column_remove">Delete Session</a>'+'</div></div></div></div>');
          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Wednesday_select_hour_first').append('<option>0'+i+'</option>');
            }else{
              $('.Wednesday_select_hour_first').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Wednesday_select_minutes_first').append('<option>0'+i+'</option>');
            }else{
              $('.Wednesday_select_minutes_first').append('<option>'+i+'</option>');
            }
            
          }

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Wednesday_select_hour_third').append('<option>0'+i+'</option>');
            }else{
              $('.Wednesday_select_hour_third').append('<option>'+i+'</option>');
            }

            
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Wednesday_select_hour_four').append('<option>0'+i+'</option>');
            }else{
              $('.Wednesday_select_hour_four').append('<option>'+i+'</option>');
            }
            
          }
      });
      $(document).on('click', '.Wednesday_column_remove', function() {
        $(this).closest('div#delete_sub_form').remove();
      });

      var Thursday = 0;
      //add_Thursday_column_plus
      $(".add_Thursday_column_plus").click(function() {
        Thursday++;
          $('.add_Thursday_column').append('<div class="dlt_session_block" id="delete_sub_form"><div class="row align-items-center mb-3"><div class="col-sm-2"><select class="minimal form-select Thursday_select_hour_first" name="Thursday_select_hour_first['+Wednesday+']">'+
          '</select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Thursday_select_minutes_first" name="Thursday_select_minutes_first['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Thursday_select_hour_third" name="Thursday_select_hour_third['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Thursday_select_hour_four" name="Thursday_select_hour_four['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2 col-md-4 col-lg-2"><div class="add_session"><i class="fa fa-minus text-danger me-1"></i>'+
          '<a href="javascript:void(0)" class="text-danger Thursday_column_remove">Delete Session</a>'+'</div></div></div></div>');

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Thursday_select_hour_first').append('<option>0'+i+'</option>');
            }else{
              $('.Thursday_select_hour_first').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Thursday_select_minutes_first').append('<option>0'+i+'</option>');
            }else{
              $('.Thursday_select_minutes_first').append('<option>'+i+'</option>');
            }
            
          }

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Thursday_select_hour_third').append('<option>0'+i+'</option>');
            }else{
              $('.Thursday_select_hour_third').append('<option>'+i+'</option>');
            }

            
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Thursday_select_hour_four').append('<option>0'+i+'</option>');
            }else{
              $('.Thursday_select_hour_four').append('<option>'+i+'</option>');
            }
            
          }

      });
      $(document).on('click', '.Thursday_column_remove', function() {
        $(this).closest('div#delete_sub_form').remove();
      });

      var Friday = 0;
      //add_Friday_column_plus
      $(".add_Friday_column_plus").click(function() {
        Friday++;
          $('.add_Friday_column').append('<div class="dlt_session_block" id="delete_sub_form"><div class="row align-items-center mb-3"><div class="col-sm-2"><select class="minimal form-select Friday_select_hour_first" name="Friday_select_hour_first['+Wednesday+']">'+
          '</select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Friday_select_minutes_first" name="Friday_select_minutes_first['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Friday_select_hour_third" name="Friday_select_hour_third['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Friday_select_hour_four" name="Friday_select_hour_four['+Wednesday+']"></select></div>'+
          '<div class="col-sm-2 col-md-4 col-lg-2"><div class="add_session"><i class="fa fa-minus text-danger me-1"></i>'+
          '<a href="javascript:void(0)" class="text-danger Friday_column_remove">Delete Session</a>'+'</div></div></div></div>');
          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Friday_select_hour_first').append('<option>0'+i+'</option>');
            }else{
              $('.Friday_select_hour_first').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Friday_select_minutes_first').append('<option>0'+i+'</option>');
            }else{
              $('.Friday_select_minutes_first').append('<option>'+i+'</option>');
            }
            
          }

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Friday_select_hour_third').append('<option>0'+i+'</option>');
            }else{
              $('.Friday_select_hour_third').append('<option>'+i+'</option>');
            }

            
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Friday_select_hour_four').append('<option>0'+i+'</option>');
            }else{
              $('.Friday_select_hour_four').append('<option>'+i+'</option>');
            }
            
          }
      });
      $(document).on('click', '.Friday_column_remove', function() {
        $(this).closest('div#delete_sub_form').remove();
      });

      var Saturday = 0;
      //add_Saturday_column_plus
      $(".add_Saturday_column_plus").click(function() {
        Saturday++;
          $('.add_Saturday_column').append('<div class="dlt_session_block" id="delete_sub_form"><div class="row align-items-center mb-3"><div class="col-sm-2"><select class="minimal form-select Saturday_select_hour_first" name="Saturday_select_hour_first['+Saturday+']">'+
          '</select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Saturday_select_minutes_first"name="Saturday_select_minutes_first['+Saturday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Saturday_select_hour_third" name="Saturday_select_hour_third['+Saturday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Saturday_select_hour_four" name="Saturday_select_hour_four['+Saturday+']"></select></div>'+
          '<div class="col-sm-2 col-md-4 col-lg-2"><div class="add_session"><i class="fa fa-minus text-danger me-1"></i>'+
          '<a href="javascript:void(0)" class="text-danger Saturday_column_remove">Delete Session</a>'+'</div></div></div></div>');
          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Saturday_select_hour_first').append('<option>0'+i+'</option>');
            }else{
              $('.Saturday_select_hour_first').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Saturday_select_minutes_first').append('<option>0'+i+'</option>');
            }else{
              $('.Saturday_select_minutes_first').append('<option>'+i+'</option>');
            }
            
          }

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Saturday_select_hour_third').append('<option>0'+i+'</option>');
            }else{
              $('.Saturday_select_hour_third').append('<option>'+i+'</option>');
            }

            
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Saturday_select_hour_four').append('<option>0'+i+'</option>');
            }else{
              $('.Saturday_select_hour_four').append('<option>'+i+'</option>');
            }
            
          }
      });
      $(document).on('click', '.Saturday_column_remove', function() {
        $(this).closest('div#delete_sub_form').remove();
      });

      var Sunday=0;
      //add_Sunday_column_plus
      $(".add_Sunday_column_plus").click(function() {
        Sunday++;
          $('.add_Sunday_column').append('<div class="dlt_session_block" id="delete_sub_form"><div class="row align-items-center mb-3"><div class="col-sm-2"><select class="minimal form-select Sunday_select_hour_first" name="Sunday_select_hour_first['+Saturday+']">'+
          '</select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Sunday_select_minutes_first" name="Sunday_select_minutes_first['+Saturday+']"></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Sunday_select_hour_third" name="Sunday_select_hour_third['+Saturday+']" ></select></div>'+
          '<div class="col-sm-2"><select class="minimal form-select Sunday_select_hour_four" name="Sunday_select_hour_four['+Saturday+']" ></select></div>'+
          '<div class="col-sm-2 col-md-4 col-lg-2"><div class="add_session"><i class="fa fa-minus text-danger me-1"></i>'+
          '<a href="javascript:void(0)" class="text-danger Sunday_column_remove">Delete Session</a>'+'</div></div></div></div>');
          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Sunday_select_hour_first').append('<option>0'+i+'</option>');
            }else{
              $('.Sunday_select_hour_first').append('<option>'+i+'</option>');
            }
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Sunday_select_minutes_first').append('<option>0'+i+'</option>');
            }else{
              $('.Sunday_select_minutes_first').append('<option>'+i+'</option>');
            }
            
          }

          for(var i = 0; i < 24; ++i){
            if(i<10){
              $('.Sunday_select_hour_third').append('<option>0'+i+'</option>');
            }else{
              $('.Sunday_select_hour_third').append('<option>'+i+'</option>');
            }

            
          }

          for(var i = 0; i < 60; ++i){
            if(i<10){
              $('.Sunday_select_hour_four').append('<option>0'+i+'</option>');
            }else{
              $('.Sunday_select_hour_four').append('<option>'+i+'</option>');
            }
            
          }
      });
      $(document).on('click', '.Sunday_column_remove', function() {
        $(this).closest('div#delete_sub_form').remove();
      });

      



  });
  </script>
@endsection