@extends('front.app_master')

@section('content')

<main id="main" class="main">

    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>Calender</h1>
        </div>
      </div>
    
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="account_resident.html">Home</a></li>
            <li class="breadcrumb-item active">Calander</li>
          </ol>
        </nav>
      </div>
      
    </div>

    <section class="section">
    <form action="{{ route('booking')}}" method="POST">
      @csrf

      <div class="row">
        <div class="col-lg-12">

          <div class="card password_block">
            <div class="card-body">

               <div class="row">
                <div class="col-sm-6">
                  <label for="calender" class="form-label">Facility</label>
                  <select class="minimal form-select" id="facility_id_data" name="facility_id_data">
                    <option readonly value=''>Please Select</option>
                      @foreach($data as $row)
                      @if($facility_get_id == $row->id)
                        <option selected value="{{ $row->id}}">{{ $row->title  }}</option>
                      @else
                        <option value="{{ $row->id}}">{{ $row->title  }}</option>
                      @endif
                        
                      @endforeach
                  </select>
                  @if ($errors->has('facility_id_data'))
                      <span class='text-danger'>{{ $errors->first('facility_id_data') }}</span>
                  @endif
                  
                </div>

                <div class="col-sm-6">
                  <label for="calender" class="form-label">Date From (Show 7 days)</label>
                  <input type="date" class="form-control" id="calender_date" value="{{ date('Y-m-d', strtotime($selectDate.'+0 days'))}}"> 
                </div>
               </div>

              <hr>
              <div class="table-responsive">
                <table class="table table-calender table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2" class="align-middle">Session</th>
                      @foreach($aryRange as  $daterange)
                          <th>{{ date("d", strtotime($daterange)) }}-{{ date("m", strtotime($daterange)) }}</th>
                      @endforeach
                    </tr>
                   
                   <input type="hidden" name="date_data" id="date_data"> 
                   <input type="hidden" name="date_days" id="date_days"> 
                   

                    <tr>
                        @foreach($aryRange as  $daterange)
                              <th>{{ date("D", strtotime($daterange)) }}</th>
                        @endforeach
                    </tr>


                  </thead>


                  <?php $d = 1; ?>
                  @foreach($data_table as $key => $lat)
                  
                  <tr>
                    @foreach($lastSlotData as $time)
                    @if($lat->_key == $time['day'] )
                    <td>
                        {{ $lat->time}}  
                    </td>
                      
                      @if($lat->_key = $selectDay ) 
                      
                        <?php  $counts1 = $booking_count::where('time_slot',$lat->time)->where('facility_id',$lat->facity_id)->where('date',date($selectDate))->count(); ?> 
                        <td class="@if(empty($counts1)) available @else booked @endif date_data_in"  data-date_days_in="{{ $lat->time}}" data-date_in="{{ date('Y-m-d', strtotime($selectDate.'+0 days')) }}"><button type="submit" class='text-white btn p-0'>
                          @if(empty($counts1))
                            Available
                          @else
                            {{ $counts1 }}/{{ $facilityData->quota_per_session}}
                          @endif
                            </button>
                        </td>
                      @endif
                      
                      @if($lat->_key = $selectDay1) 
                          <?php $counts2 = $booking_count::where('time_slot',$lat->time)->where('facility_id',$lat->facity_id)->where('date',date('Y-m-d', strtotime($selectDate.'+1 days')))->count();
                          
                          ?>
                           
                        <td class="@if($counts2 == 0) available @else booked @endif date_data_in"  data-date_days_in="{{ $lat->time}}" data-date_in="{{ date('Y-m-d',strtotime('+1 days'))}}"><button type="submit" class='text-white btn p-0'>
                          @if($counts2 == 0)
                            Available 
                          @else
                            {{ $counts2}}/{{ $facilityData->quota_per_session}}
                          @endif</button>
                        </td>

                      @endif

                      @if($lat->_key = $selectDay2) 

                      <?php 
                       $counts3 = $booking_count::where('time_slot',$lat->time)->where('facility_id',$lat->facity_id)->where('date',
                       
                       date('Y-m-d', strtotime($selectDate.'+2 days')))->count(); 
                       
                      ?> 

                      <td class="@if($counts3 == 0) available @else booked @endif date_data_in"  data-date_days_in="{{ $lat->time}}" data-date_in="{{ date('Y-m-d', strtotime($selectDate.'+2 days')) }}"> <button type="submit" class='text-white btn p-0'>
                      @if($counts3 == 0)
                            Available 
                          @else
                           {{ $counts3}}/{{ $facilityData->quota_per_session}}
                          @endif
                        </button></td>
                      @endif


                      @if($lat->_key = $selectDay3) 
                      <?php 
                       $counts4 = $booking_count::where('time_slot',$lat->time)->where('facility_id',$lat->facity_id)->where('date',date('Y-m-d', strtotime($selectDate.'+3 days')))->count(); 
                      ?> 

                      <td class="@if($counts4 == 0) available @else booked @endif date_data_in"  data-date_days_in="{{ $lat->time}}" data-date_in="{{ date('Y-m-d', strtotime($selectDate.'+3 days')) }}"><button type="submit" class='text-white btn p-0'>
                      @if($counts4 == 0)
                            Available
                      @else
                          {{ $counts4}}/{{ $facilityData->quota_per_session}}
                      @endif</button></td>
                      @endif

                      @if($lat->_key = $selectDay4) 

                      <?php 
                       $counts5 = $booking_count::where('time_slot',$lat->time)->where('facility_id',$lat->facity_id)->where('date',date('Y-m-d', strtotime($selectDate.'+4 days')))->count(); 
                      ?> 

                      <td class="@if($counts5 == 0) available @else booked @endif date_data_in"  data-date_days_in="{{ $lat->time}}" data-date_in="{{ date('Y-m-d', strtotime($selectDate.'+4 days')) }}">  <button type="submit" class='text-white btn p-0'>
                        @if($counts5 == 0)
                            Available
                          @else
                          {{ $counts5}}/{{ $facilityData->quota_per_session}}
                          @endif</button></td>
                        @endif


                      @if($lat->_key = $selectDay5) 

                      <?php 
                       $counts6 = $booking_count::where('time_slot',$lat->time)->where('facility_id',$lat->facity_id)->where('date',date('Y-m-d', strtotime($selectDate.'+5 days')))->count(); 
                      ?> 

                      <td class="@if($counts6 == 0) available @else booked @endif date_data_in"  data-date_days_in="{{ $lat->time}}" data-date_in="{{ date('Y-m-d', strtotime($selectDate.'+5 days')) }}"><button type="submit" class='text-white btn p-0'>
                        @if($counts6 == 0)
                            Available 
                          @else
                          {{ $counts6}}/{{ $facilityData->quota_per_session}}
                          @endif</button></td>
                        @endif
                      
                      
                      @if($lat->_key = $selectDay6 ) 
                      <?php 
                       $counts7 = $booking_count::where('time_slot',$lat->time)->where('facility_id',$lat->facity_id)->where('date',date('Y-m-d', strtotime($selectDate.'+6 days')))->count(); 
                      ?> 

                      <td class="@if($counts7 == 0) available @else booked @endif date_data_in"  data-date_days_in="{{ $lat->time}}" data-date_in="{{ date('Y-m-d', strtotime($selectDate.'+6 days')) }}"><button type="submit" class='text-white btn p-0'>@if($counts7 == 0)
                            Available
                          @else
                            {{ $counts7}}/{{ $facilityData->quota_per_session}}
                          @endif</button></td>
                      
                      @endif
                      <?php $d++; ?>
                      @endif
             

          @endforeach
          
        </tr>
          @endforeach
                  
                 


    
                
                  
                  </tbody> 

                 
                  
              </div>

            </div>
          </div>
        </div>
      </div>
      </form>

      <form action="{{ route('logcalender.index') }}" method="get">
          <input class="form-control" type="hidden" name="facility_get_id" id="facility_get_id" >
          <input type="hidden" name="calender_date" id="in_calender_date">
          <button type="submit"class="btn btn-primary facility_get_id d-none">Login</button>
      </form>


    </section>

  </main><!-- End #main -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {

      
      $("#facility_id_data").change(function() {
          var facility_get_id = $('#facility_id_data').val();
          var in_calender_date= $('#calender_date').val();
          $('#facility_get_id').val(facility_get_id);
          $('#in_calender_date').val(in_calender_date);
          $('.facility_get_id').click();
      });

      $("#calender_date").change(function() {
          var facility_get_id = $('#facility_id_data').val();
          var in_calender_date= $('#calender_date').val();
          $('#facility_get_id').val(facility_get_id);
          $('#in_calender_date').val(in_calender_date);
          $('.facility_get_id').click();
      });



        $(".date_data_in").click(function () {
          var date = $(this).attr("data-date_in");
          
          var date_days_in = $(this).attr("data-date_days_in");
         
          $('#date_data').val(date);
          $('#date_days').val(date_days_in);
        });
    });
  </script>
@endsection


