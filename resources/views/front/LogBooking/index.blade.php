@extends('front.app_master')

@section('content')

<main id="main" class="main">

    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>Booking</h1>
        </div>
      </div>
    
      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="account_resident.html">Home</a></li>
            <li class="breadcrumb-item active">Booking</li>
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
                  <select class="minimal form-select" id="facility_id_data">
                 
                    <option readonly >Please Select</option>
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
                    <option>{{ $date_data}}</option>
                    
                  </select>
                </div>
               </div>

               <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-4 mt-3">
                      <label for="active" class="form-label">Tower</label>
                      <select class="minimal form-select" id='statusTower'>
                        <option value='null'>Select Tower</option>
                          @foreach($towerData as $data)
                            <option value="{{ $data->id}}">{{ $data->tower_name}}</option>
                          @endforeach
                      </select>
                    </div>
    
                    <div class="col-sm-4 mt-3">
                      <label for="active" class="form-label">Floor</label>
                      <select class="minimal form-select" id='statusFloor'>
                        <option value="null">Select Foor</option>
                      </select>
                    </div>
    
                    <div class="col-sm-4 mt-3">
                      <label for="active" class="form-label">Unit</label>
                      <select class="minimal form-select" id='statusUnit'>
                        <option value="">Select Unit</option>
                      </select>
                    </div>
                  </div>
                  
                </div>
                
               </div>
              </form>

            </div>
          </div>

          <div class="card password_block">
            <div class="card-body">
              <p>Resident(s)</p>
              <span id="user_required"></span>
              <div class="table-responsive">
                
                <table class="table table-striped" id='front_example' >
                  <thead>
                    <tr>
                      <th></th>
                        <!-- <th scope="col">
                          <input class="form-check-input" type="radio" id="booking1" value="option1">
                        </th> -->
                      <th scope="col">陳大文</th>
                      <th scope="col">Chan Tai Man</th>
                      <th scope="col">
                        <span>852</span>
                        <span>88888888</span>
                      </th>
                      <th class='d-none'></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($MasterData as $row)
                      <tr class="row-select">
                        <th scope="row">

                        @if($row->booking_statu == "1")

                          <div class='form-check form-check-inline'>
                              <input type="hidden" class="form-check-input booking_id" name="booking_id" id="booking_id" value="{{ $row->id }}">
                          </div>

                        @else

                          <div class='form-check form-check-inline'>
                              <input type="radio" class="form-check-input booking_id" name="booking_id" id="booking_id" value="{{ $row->id }}">
                          </div>

                        @endif
                          
                        </th>
                          
                          <td>{{ $row->chinese_name}} <p class='d-none'>{{$row->towers_id}}</p></td>
                          <td>{{ $row->english_name}} <p class='d-none'>{{$row->floars_id}}</p></td>
                          <td>{{ $row->text}} <p class='d-none'>{{$row->unit_id}}</p></td>
                          <td class='d-none id'>{{$row->id}}</td>
                      </tr>
                    @endforeach  
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body btn_block">
              <a href="#" class="btn btn-secondary">Cancel</a>
              <button type="button" class="btn btn-success booking_store" id="booking_store">Enroll</button>
              <!-- <a href="#" class="btn btn-success booking_store" data-bs-toggle="modal" data-bs-target="#enrololmodal">Enroll</a> -->
            </div>
          </div>

        </div>

    
      </div>
    </section>

    
<!-- Modal -->
<div class="modal fade modal_enroll" id="enrololmodal" tabindex="-1" aria-labelledby="enrololmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h1 class="modal-title" id="facility_name_model">
            
          </h1>
        </div>
        <div class="modal-body text-center">
          <P id="facility_date_model"></P>
          <P id="facility_time_slot_model">09:00 - 10:00</P>
          <P>is fully booked.</P>
        </div>
        <div class="modal-footer text-center">
          <a href="{{ route('logcalender.index')}}">Try other Date or Session</a>
        </div>
      </div>
    </div>
  </div>


  </main><!-- End #main -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      //floor data get
    //floor data get
    $("#statusTower").change(function() {
      var id = $('#statusTower').val();
      $.ajax({
        type: 'get',
        url: '{{ url("get_flor") }}' + '/' + id,
        data: {},
        success: function(flor) {
          $('#statusFloor').html('');
          $('#statusFloor').append('<option value="null">please select</option>');
          $.each(flor, function(key, value) {
            $("#statusFloor").append('<option value="' + value
              .id + '">' + value.floar_name + '</option>');
          });
        }
      });
    });
    //get units data
    $("#statusFloor").change(function() {
      var floar_id = $('#statusFloor').val();
      $.ajax({
        type: 'get',
        url: '{{ url("get_unit") }}' + '/' + floar_id,
        data: {},
        success: function(unitData) {
          $('#statusUnit').html('');
          $('#statusUnit').append('<option value="null">please select</option>');
          $.each(unitData, function(key, value) {
            $("#statusUnit").append('<option value="' + value.id + '">' + value.unit_name + '</option>');
          });
        }
      });
  });

      $(".booking_store").click(function() {
        var facility  = $('#facility_id_data').val();
        var date      = $('#date_in').val();
        var time_slot      = $('#time_slot').val();
        var id =  0;
        var booking_id = $("input[name='booking_id']:checked").val();
        $.ajax({
              type:'POST',
              url: "{{ route('booking_store')}}",
              data:{ facility:facility,date:date,time_slot:time_slot,booking_id:booking_id},
                success: function(data){
                  if(data.success == 0){
                    $('#facility_name_model').html(data.facility_name);
                    $('#facility_date_model').html(data.date);
                    $('#facility_time_slot_model').html(data.timeSlot_from);
                    $('#enrololmodal').modal('show')
                  }else{
                    location.replace("{{ route('logcalender.index') }}?id="+data.facility_id);
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

      

    });

  </script>  
@endsection