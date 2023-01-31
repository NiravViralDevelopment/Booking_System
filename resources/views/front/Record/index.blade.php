@extends('front.app_master')

@section('content')
<main id="main" class="main">

    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>Record</h1>
        </div>
      </div>
    
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="account_resident.html">Home</a></li>
            <li class="breadcrumb-item active">Record</li>
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
                  <input type="text" class="form-control" name="myInputTextFieldFront"id="myInputTextFieldFront" placeholder="Search Name, Contact Number">
                </div>

                <div class="col-sm-6 mt-3">
                  <label for="active" class="form-label">Facility</label>
                  <select class="minimal form-select" id='FacilityFilter'>
                    <option readonly value=''>Please Select</option>
                      @foreach($data as $row)
                        <option value="{{ $row->id}}">{{ $row->title  }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-sm-6 mt-3">
                  <label for="active" class="form-label">Status</label>
                    <select class="minimal form-select" id='statusFilter'> 
                      <option value=''>All</option>
                      <option value='Attendance'>Attendance</option>
                      <option value='Booked'>Booked</option>
                    </select>
                </div>

                <div class="col-sm-6 mt-3">
                  <label for="active" class="form-label">Date</label>
                  <input type="date" class='form-control record_date' name="record_date" id="record_date" min="<?php echo date("Y-m-d"); ?>">
                </div>

                <div class="col-sm-6 mt-3">
                  <label for="active" class="form-label">Session</label>
                  <select class="minimal form-select" id="select_session">
                    <option value="">Select session</option>
                  </select>
                </div>
               </div>

               <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6 mt-3">
                      <label for="active" class="form-label">Tower</label>
                      <select class="minimal form-select" id='recored_statusTower'>
                          <option value="null">please select</option>
                          @foreach($towerData as $tower)
                            <option value="{{ $tower->id }}">{{ $tower->tower_name }}</option>
                          @endforeach
                      </select>
                    </div>
    
                    <div class="col-sm-6 mt-3">
                      <label for="active" class="form-label">Floor</label>
                      <select class="minimal form-select" id='recored_statusFloor'>
                        <option value=''>please select</option>
                      
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6 mt-3">
                      <label for="active" class="form-label">Unit</label>
                      <select class="minimal form-select" id='recored_statusUnit'>
                        <option value=''>please select</option>
                      </select>
                    </div>
    
                    <div class="col-sm-6 mt-3">
                      <label for="active" class="form-label">Order By</label>
                      <select class="minimal form-select">
                        <option>Updated At</option>
                        <option>Enrollment Date</option>
                      </select>
                    </div>
                  </div>
                </div>
               </div>

               <div class="row mt-3">
                <div class="col-sm-12">
                <a href="javascript:void(0)" class="btn btn-success btn-export" id='ExportReporttoExcel'>{{ __('messages.Export')}}</a>
                </div>
               </div>
              </form>

              <hr>

              <div class="table-responsive">
                <table class="table table_record table-striped" id='front_example'>
                  <thead>
                    <tr>
                      <th scope="col">Facility</th>
                      <th scope="col">Date</th>
                      <th scope="col">Session</th>
                      <th scope="col">Tower</th>
                      <th scope="col">Floor</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Chinese Name</th>
                      <th scope="col">English Name</th>
                      <th scope="col">Contact Number</th>
                      <th scope="col">Status</th>
                      <th scope="col">Updated At</th>
                      <th scope="col">Enrollment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $slottime = ''; ?>
                  @foreach($facility_booking as $booking)
                 
                    <tr>
                        <th scope="row">{{ $booking->title}} <p class='d-none'>{{ $booking->facility_booking_facility_id }}</p></th>
                        <td>{{ date("d-m-Y", strtotime($booking->facility_booking_date)) }}</td>
                        <td>{{ $booking->facility_booking_time_slot}}</td>
                        <td>{{ $booking->tower_name }} <p class='d-none'>{{$booking->tower_id}}</p> </td>
                        <td>{{ $booking->floar_name }} <p class='d-none'>{{$booking->floor_id}}</p></td>
                        <td>{{ $booking->unit_name }}  <p class='d-none'>{{$booking->unit_id}}</p></td>
                        <td>{{ $booking->chinese_name }}</td>
                        <td>{{ $booking->english_name }}</td>
                        <td>{{ $booking->text }}</td>
                        <td>
                          @if($booking->checked_attendance == "1")
                            <span class='text-success'>Attendance</span>
                          @else
                            <span class='text-danger'>Booked</span>
                          @endif
                        </td>
                        <td>{{ $booking->facility_booking_updated_at}}</td>
                        <td>{{ $booking->facility_booking_created_at}}</td>
                        
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

  </main><!-- End #main -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function() {
     //floor data get
     $("#recored_statusTower").change(function() {
      var id = $('#recored_statusTower').val();
      $.ajax({
        type: 'get',
        url: '{{ url("get_flor") }}' + '/' + id,
        data: {},
        success: function(flor) {
          $('#recored_statusFloor').html('');
          $('#recored_statusFloor').append('<option value="null">please select</option>');
          $.each(flor, function(key, value) {
            $("#recored_statusFloor").append('<option value="' + value
              .id + '">' + value.floar_name + '</option>');
          });
        }
      });
    });
    //get units data
    $("#recored_statusFloor").change(function() {
      var floar_id = $('#recored_statusFloor').val();
      $.ajax({
        type: 'get',
        url: '{{ url("get_unit") }}' + '/' + floar_id,
        data: {},
        success: function(unitData) {
          $('#recored_statusUnit').html('');
          $('#recored_statusUnit').append('<option value="null">please select</option>');
          $.each(unitData, function(key, value) {
            $("#recored_statusUnit").append('<option value="' + value.id + '">' + value.unit_name + '</option>');
          });
        }
      });

  });



});

  </script>

@endsection