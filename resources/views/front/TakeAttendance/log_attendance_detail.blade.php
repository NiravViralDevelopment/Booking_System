
@extends('front.app_master')

@section('content')
<main id="main" class="main">

<div class="row">
  <div class="col-sm-6">
    <div class="pagetitle">
      <h1>Take Attendance</h1>
    </div>
  </div>

  <div class="col-sm-6">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="account_resident.html">Home</a></li>
        <li class="breadcrumb-item">Take Attendance</li>
        <li class="breadcrumb-item active">Detail</li>
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
              <label for="active" class="form-label">Facility</label>
              <select class="minimal form-select" id="tack_attendance_detailsfacility_id_data" name="tack_attendance_detailsfacility_id_data">
                    <option readonly value=''>Please Select</option>
                      @foreach($data as $row)
                          @if($facility_id_data == $row->id)
                            <option selected value="{{ $row->id}}">{{ $row->title  }}</option>
                          @else
                            <option value="{{ $row->id}}">{{ $row->title  }}</option>
                          @endif
                      @endforeach
                  </select>
            </div>

            <div class="col-sm-6 mt-3">
              <label for="active" class="form-label">Date</label>
                <input type="date" class='form-control' name="date_in" value='{{ $date_data }}' id="date_in" >
                <input type="hidden" class='form-control' name="time_slot" id="time_slot"value="{{ $date_days}}">
            </div>

            <div class="col-sm-6 mt-3">
              <label for="active" class="form-label">Session</label>
              <select class="minimal form-select">
                <option>{{ $date_days}}</option>
              </select>
            </div>
           </div>

          </form>

        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <p>Attendance</p>
          <span id="user_required"></span>
          <hr>

          <div class="table-responsive">
            <table class="table table_attendance_detail table-striped" id='front_example'>
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th class='d-none' scope="col"></th>
                  <th scope="col">Tower</th>
                  <th scope="col">Floor</th>
                  <th scope="col">Unit</th>
                  <th scope="col">Chinese Name</th>
                  <th scope="col">English Name</th>
                  <th scope="col">Contact Number</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              @foreach($facility_booking as $booking) 
               
                <tr>
                    <td class='d-none'>{{ $booking->facility_booking_facility_id }}</td>
                    <th scope="row">
                        @if($booking->checked_attendance == "1")
                          <div class='form-check form-check-inline'>
                              <input type="hidden" class="form-check-input facility_booking_id "  name="facility_booking_id{{$booking->facility_booking_id}}" id="facility_booking_id{{$booking->facility_booking_id}}"  value="{{ $booking->facility_booking_id }}">
                          </div>
                          @else
                          <div class='form-check form-check-inline'>
                              <input type="radio" class="form-check-input facility_booking_id "  name="facility_booking_id" id="facility_booking_id"  value="{{ $booking->facility_booking_id }}">
                          </div>
                        @endif
                    </th>
                        <td>{{ $booking->tower_name }} <p class='d-none'>{{$booking->tower_id}}</p> </td>
                        <td>{{ $booking->floar_name }} <p class='d-none'>{{$booking->floor_id}}</p></td>
                        <td>{{ $booking->unit_name }}  <p class='d-none'>{{$booking->unit_id}}</p></td>
                        <td>{{ $booking->chinese_name }}</td>
                        <td>{{ $booking->english_name }}</td>
                        <td>{{ $booking->text }} <p class='d-none'>{{ $booking->facility_booking_date}}</p></td>
                        <td>
                        @if($booking->checked_attendance == "0")
                            <i class="fa fa-close"></i><a href="{{ route('log_attendance_delete',$booking->facility_booking_id) }}">cancel booking</a>
                        @endif
                          </td>
                </tr>
                @endforeach

               

               
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <!-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#enrololmodal">Save</a> -->
          <button type="button" class="btn btn-success attendance_store" id="attendance_store">Enroll</button>
        </div>
      </div>

    </div>


  </div>
</section>

</main><!-- End #main -->


<!-- Modal -->
<div class="modal fade modal_enroll" id="enrololmodal" tabindex="-1" aria-labelledby="enrololmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h1 class="modal-title" id="enrololmodalLabel">
          Table Tennis Room
        </h1>
      </div>
      <div class="modal-body text-center">
        <P>21-9-2022</P>
        <P>09:00 - 10:00</P>
        <P>is fully booked.</P>
      </div>
      <div class="modal-footer text-center">
        <a href="log_calender.html">Try other Date or Session</a>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  });

      $(".attendance_store").click(function() {
        var facility  = $('#facility_id_data').val();
        var date      = $('#date_in').val();
        var time_slot = $('#time_slot').val();
        var id =  0;
        var facility_booking_id = $("input:radio.facility_booking_id:checked").val();
        
        $.ajax({
              type:'POST',
              url: "{{ route('attendance_store')}}",
              data:{ facility:facility,date:date,time_slot:time_slot,facility_booking_id:facility_booking_id},
                success: function(data){
                  if(data.success == 0){

                    $('#facility_name_model').html(data.facility_name);
                    $('#facility_date_model').html(data.date);
                    $('#facility_time_slot_model').html(data.timeSlot_from+'-'+data.timeSlot_to);
                    $('#enrololmodal').modal('show')
                  }else{
                    location.replace("{{ route('tack_attendance.index') }}?id="+data.facility_id);
                  }
                },
                error: function (xhr) {
                  if(xhr.status == 422) {
                      var errors = JSON.parse(xhr.responseText);
                      if (errors.message) {
                          $('#user_required').html('<p class="text-danger">'+errors.message+'</p>')
                      }
                  }
                }
          });

      });

      



  </script>  
@endsection