@extends('front.app_master')

@section('content')

<main id="main" class="main">

    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>{{ __('messages.Resident')}}</h1>
        </div>
      </div>

      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('resident.index')}}">{{ __('messages.Home')}}</a></li>
            <li class="breadcrumb-item active">{{ __('messages.Resident')}}</li>
          </ol>
        </nav>
      </div>
    </div>
   
    <section class="section resident_sec">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                <a href="{{ route('resident.create')}}" class="btn btn-success">{{ __('messages.Create')}}</a>
              </h5>
              <hr>
              
              <form>
                <div class="row">
                  <div class="col-sm-12">
                    <label for="filter" class="form-label">{{ __('messages.Filter')}}</label>
                    <input type="text" class="form-control" id="myInputTextFieldFront" placeholder="Search Name, Contact Number">
                  </div>

                  <div class="col-sm-3 col-md-6 col-lg-3 mb-2">
                    <label for="active" class="form-label">{{ __('messages.Active')}}</label>
                    <select class="minimal form-select" id='statusFilter_first'> 
                      <option value=''>All</option>
                      <option value='1'>Active</option>
                      <option value='2'>In-Active</option>
                    </select>
                  </div>

                  <div class="col-sm-3 col-md-6 col-lg-3 mb-2">
                    <label for="tower" class="form-label">{{ __('messages.Tower')}}</label>
                    <select class="minimal form-select" id='statusTower'>
                      <option value="null">please select</option>
                       @foreach($towerData as $tower)
                        <option value="{{ $tower->id }}">{{ $tower->tower_name }}</option>
                       @endforeach
                    </select>
                  </div>

                  <div class="col-sm-3 col-md-6 col-lg-3 mb-2">
                    <label for="floor" class="form-label">{{ __('messages.Floor')}}</label>
                    <select class="minimal form-select" id='statusFloor'>
                      <option value=''>please select</option>
                    
                    </select>
                  </div>

                  <div class="col-sm-3 col-md-6 col-lg-3 mb-2">
                    <label for="unit" class="form-label">{{ __('messages.Unit')}}</label>
                    <select class="minimal form-select" id='statusUnit'>
                      <option value=''>please select</option>
                    </select>
                  </div>
                </div>
              </form>

              <div class="row">
                <div class="col-sm-12 mt-3">
                  <a href="javascript:void(0)" class="btn btn-success btn-export" id='ExportReporttoExcel'>{{ __('messages.Export')}}</a>
                </div>

                
                <hr>

                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-striped" id='front_example'>
                      <thead>
                        <tr>
                          <th scope="col">Sr No.</th>
                          <th scope="col">Tower</th>
                          <th scope="col">Floor</th>
                          <th scope="col">Unit</th>
                          <th scope="col">Chinese Name</th>
                          <th scope="col">English Name</th>
                          <th scope="col">Mobile</th>
                          <th scope="col">Email</th>
                          <th scope="col">Active</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>

                      @foreach($MasterData as $key=>$data)

                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $data->tower_name}} <p class='d-none'>{{$data->towers_id}}</p></td>
                          <td>{{ $data->floar_name}} <p class='d-none'>{{$data->floars_id}}</p></td>
                          <td>{{ $data->unit_name}}  <p class='d-none'>{{$data->unit_id}}</p></td>
                          <td>{{ $data->chinese_name}}</td>
                          <td>{{ $data->english_name}}</td>
                          <td>{{ $data->country_code}} {{ $data->text}}</td>
                          <td>{{ $data->email}}</td>
                          <td>
                            @if($data->status == 1)
                            <a href="{{ route('resident_deactive',$data->id)}}"><i class="fa fa-check" onclick="return confirm('Deactivating User will impact on future booking done by that person and will be deleted');"></i></a>
                            <span>1</span>
                            @else
                              <a href="{{ route('resident_active',$data->id)}}"><i class="fa fa-pause-circle-o" onclick="return confirm('Are you sure Active?');"></i></a>
                              <span>2</span>
                              
                            @endif
                            
                          </td>
                          <td><a href="{{ route('resident.edit',$data->id)}}"><i class="fa fa-pencil-square-o"></i></a></td>
                          <td><a href="{{ route('resident_delete',$data->id)}}" onclick="return confirm('Are you sure you want to delete this ?');"><i class="fa fa-trash text-danger"></i></a></td>
                      </tr>

                      @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                 
                </div>
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
});

  </script>
  @endsection