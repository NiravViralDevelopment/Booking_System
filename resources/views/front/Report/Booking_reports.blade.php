@extends('front.app_master')

@section('content')

<main id="main" class="main">

    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>Booking Report</h1>
        </div>
      </div>
    
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="account_resident.html">Home</a></li>
            <li class="breadcrumb-item active">Report</li>
          </ol>
        </nav>
      </div>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card password_block">
            <div class="card-body">

              <form>
               <div class="row">
                <div class="col-sm-12">
                  <label for="active" class="form-label">Filter</label>
                    <select class="minimal form-select" id='facility_id_data'>
                      <option readonly value=''>Please Select</option>
                        @foreach($facilityData as $row)

                        @if($facility_id == $row->id)
                          <option selected value="{{ $row->id}}">{{ $row->title  }}</option>
                        @else
                          <option value="{{ $row->id}}">{{ $row->title  }}</option>
                        @endif
                        
                        @endforeach
                    </select>
                </div>

               

                <div class="col-sm-12 mt-3">
                  <label for="active" class="form-label">Report Timeframe</label>
                  <select class="minimal form-select" id="select_day_month">
                    
                   

                    @if($all == '1')
                      <option value='0'>All</option>
                      <option selected value='1'>By Month</option>
                      <option value='2'>By Day</option>
                    @elseif($all == '2')
                      <option value='0'>All</option>
                      <option value='1'>By Month</option>
                      <option selected value='2'>By Day</option>
                    @else
                      <option value='0'>All</option>
                      <option value='1'>By Month</option>
                      <option value='2'>By Day</option>

                    @endif

                   
                    
                  
                  </select>
                </div>

                  <div class="col-sm-6 mt-3 start_month_date">
                    <label for="active" class="form-label">Month From</label>
                    <input type="date" class='form-control' id="start_month_date" value='{{ $start_month}}'>
                  </div>

                  <div class="col-sm-6 mt-3 d-none to_month_date">
                    <label for="active" class="form-label">Month From</label>
                    <input type="date" class='form-control' id="to_month_date" value='{{ $end_month}}'>
                  </div>

                  <div class="col-sm-6 mt-3 start_day_date d-none">
                    <label for="active" class="form-label">Date From</label>
                    <input type="date" class='form-control' id="start_date"  value='{{ $start_date_in}}'>
                  </div>

                  <div class="col-sm-6 mt-3 to_day_date d-none">
                    <label for="active" class="form-label">Date From</label>
                    <input type="date" class='form-control' id="end_date"  value='{{ $end_date_in}}'>
                  </div>


               <div class="row my-3">
                <div class="col-sm-12">
                  <a href="#" class="btn btn-success" id='ExportReporttoExcel'>Export</a>
                </div>
               </div>
              </form>
              
              <div class="report_table_sec">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="pagetitle">
                      <h1>{{ $facility_name}} - Booking Report</h1>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="pagetitle month_title">
                    @if($day_show == true)
                      <h1>{{ date("d-M-Y", strtotime($start_date_in)) }} to {{ date("d-M-Y", strtotime($end_date_in))}}</h1>
                    @endif
                    @if($month_show == true)
                      <h1>{{ date("M-Y", strtotime($start_month)) }} to {{ date("M-Y", strtotime($end_month))}}</h1>
                    @endif
                    
                  </div>
                  </div>
                </div>
              </div>

              <hr>

              <div class="table-responsive">
                <table class="table table_record table-striped" id='front_example'>
                  <thead>
                    <tr>
                      @if($day_show == true)
                        <th scope="col">Date</th>
                      @else
                        <th scope="col">Month</th>
                      @endif
                      
                      <th scope="col">Booked Hour</th>
                      <th scope="col">Opening Hour</th>
                      <th scope="col">Attendance Ratio</th>

                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($resualt as $data)
                    <tr>

                      @if($day_show == true)
                        <th scope="row">{{ date("d-m-Y", strtotime($data['date'])) }}</th>
                      @else
                        <th scope="row">{{ $data['date']}}</th>
                      @endif
                      <td>
                       
                        {{$data['booking_hour']}}
                      
                        </td>
                      <td>{{$data['opening_hour']}}</td>
                      <td>{{ number_format($data['booking_ration'],2)}} %</td>
                    
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>




              
            </div>
          </div>
        </div>
      </div>
    </section>

    <form action="{{ route('Booking_reports') }}" method="get">
          <input class="form-control" type="hidden" name="facility_get_id" id="facility_get_id" >
          <input type="hidden" name="calender_date" id="in_calender_date">
          
          <!-- All -->
          <input type="hidden" name="all" id="all_in">
          
          <!-- //month -->
          <input type="hidden" name="start_month_date_in" id="start_month_date_in">
          <input type="hidden" name="to_month_date_in" id="to_month_date_in">

          <!-- //days -->
          <input type="hidden" name="start_date_in" id="start_date_in">
          <input type="hidden" name="end_date_in" id="to_date_in">

          <button type="submit"class="btn btn-primary facility_get_id d-none">Login</button>
      </form>

  </main><!-- End #main -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    
    $(document).ready(function() {

        var showDrop = {{$all}}
        
        if(showDrop == '0'){
            $('.start_month_date').addClass('d-none');
        }
        if(showDrop == '1'){
          $('.start_month_date').removeClass('d-none');
          $('.to_month_date').removeClass('d-none');
          $('.start_day_date').addClass('d-none');
          $('.to_day_date').addClass('d-none');
        }
        if(showDrop == '2'){
          $('.start_month_date').addClass('d-none');
          $('.to_month_date').addClass('d-none');
          $('.start_day_date').removeClass('d-none');
          $('.to_day_date').removeClass('d-none');
        }

        $("#facility_id_data").change(function() {
            var facility_get_id = $('#facility_id_data').val();
            var in_calender_date= $('#calender_date').val();
            $('#facility_get_id').val(facility_get_id);
            $('#in_calender_date').val(in_calender_date);
            $('#all_in').val($('#select_day_month').val());
            $('.facility_get_id').click();
        });
        
        $('#select_day_month').change( function(){
            if($('#select_day_month').val() == 1){
                $('.start_day_date').addClass('d-none');
                $('.to_day_date').addClass('d-none');
                $('.start_month_date').removeClass('d-none');
            }
            if($('#select_day_month').val() == 2){
              $('.start_day_date').removeClass('d-none');
              $('.start_month_date').addClass('d-none');
              $('.to_month_date').addClass('d-none');
            }
            
            if($('#select_day_month').val() == '0'){
              $('#all_in').val($('#select_day_month').val());
              $('#facility_get_id').val($('#facility_id_data').val())
              $('.facility_get_id').click();
            }
        });
          
          

        $("#start_month_date").change(function() {
            $('.to_month_date').removeClass('d-none');
        });

        $("#to_month_date").change(function() {
            $('#start_month_date_in').val($('#start_month_date').val());
            $('#to_month_date_in').val($('#to_month_date').val());
            $('#facility_get_id').val($('#facility_id_data').val())
            $('#all_in').val($('#select_day_month').val());
            $('.facility_get_id').click();
        });


        //days select

        $('#start_date').change(function() {
            $('.to_day_date').removeClass('d-none');
        });

        $('#end_date').change(function() {
          $('#start_date_in').val($('#start_date').val());
          $('#to_date_in').val($('#end_date').val());
          $('#all_in').val($('#select_day_month').val());
          $('#facility_get_id').val($('#facility_id_data').val())
          $('.facility_get_id').click();

        });
       
    });

  </script>

@endsection