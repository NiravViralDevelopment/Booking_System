@extends('front.app_master')

@section('content')
<main id="main" class="main">

  <div class="row">
    <div class="col-sm-6">
      <div class="pagetitle">
        <h1>{{ __('messages.Resident Detail')}}</h1>
      </div>
    </div>

    <div class="col-sm-6">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('resident.index')}}">{{ __('messages.Home')}}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('resident.index')}}">{{ __('messages.Resident')}}</a></li>
          <li class="breadcrumb-item active">{{ __('messages.Create')}}</li>
        </ol>
      </nav>
    </div>
  </div>

  
  <section class="section resident_create_sec">
    <form action="{{ route('resident.store')}}" method='POST' enctype="multipart/form-data">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
              @csrf
              <div class="row">
                <div class="col-sm-2">
                  <label for="Tower" class="form-label">{{ __('messages.Tower')}}</label>
                  <select class="minimal form-select" id='select_tower' name="select_tower">
                    <option value=''>Select Tower</option>
                      @foreach($towerData as $data)
                        <option {{ old('select_tower') == $data->id ? "selected" : "" }} value="{{ $data->id}}">{{ $data->tower_name}}</option>
                      @endforeach
                  </select>
                    @if($errors->has('select_tower'))
                      <span class='text-danger'>{{ $errors->first('select_tower') }}</span>
                    @endif
                </div>

                <div class="col-sm-2">
                  <label for="Floor" class="form-label">{{ __('messages.Floor')}}</label>
                  <select class="minimal form-select" id='select_floor' name="select_floor">
                    <option value="">Select Foor</option>
                    
                  </select>
                    @if($errors->has('select_floor'))
                      <span class='text-danger'>{{ $errors->first('select_floor') }}</span>
                    @endif
                </div>

                <div class="col-sm-2">
                  <label for="Unit" class="form-label">{{ __('messages.Unit')}}</label>
                  <select class="minimal form-select" id='select_unit' name="select_unit">
                    <option value=''>Select Unit</option>
                  </select>
                    @if($errors->has('select_unit'))
                      <span class='text-danger'>{{ $errors->first('select_unit') }}</span>
                    @endif
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-12">
                  <p>{{ __('messages.Status')}}</p>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name='inlineCheckbox1' id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">{{ __('messages.Active')}}</label>
                  </div>
                </div>

                <div class="col-6 col-md-4 col-2">
                  <div class="form-check form-check-inline">
                    <input type='radio' class="form-check-input" name='inlineCheckbox1' id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">{{ __('messages.Inactive')}}</label>
                  </div>
                </div>
              </div>

          </div>

        </div>

        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-sm-6">
                <div class="mb-3">
                  <label for="chinesename" class="form-label">Chinese Name</label>
                  <input type="text" class="form-control" id="chinesename_up" name='chinesename_up' value='{{ old('chinesename_up')}}'>
                  @if ($errors->has('chinesename_up'))
                      <span class='text-danger'>{{ $errors->first('chinesename_up') }}</span>
                  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-3">
                  <label for="englishname" class="form-label">English Name</label>
                  <input type="text" class="form-control" id="englishname_up" name='englishname_up' value="{{ old('englishname_up')}}">
                  @if ($errors->has('englishname_up'))
                      <span class='text-danger'>{{ $errors->first('englishname_up') }}</span>
                  @endif
                </div>
              </div>

              <div class="col-sm-6 col-md-12 col-lg-6">
                <div class="row">
                  <div class="col-12">
                    <label for="Unit" class="form-label">Contact Number</label>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-4 col-sm-2">
                    <select class="minimal form-select" id='country_code' name='country_code'>
                    <option value=" ">Code</option>
                    @foreach($countryCode as $code)
                      <option value="{{ $code}}">{{ $code}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('country_code'))
                        <span class='text-danger'>{{ $errors->first('country_code') }}</span>
                    @endif
                  </div>
                  <div class="col-8 col-sm-10">
                    <input type="text" class="form-control" name="unit_text_up" value="{{ old('unit_text_up')}}">
                    @if ($errors->has('unit_text_up'))
                        <span class='text-danger'>{{ $errors->first('unit_text_up') }}</span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-12 col-lg-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="Email" name='email_up' value="{{ old('email_up')}}">
                    @if ($errors->has('email_up'))
                        <span class='text-danger'>{{ $errors->first('email_up') }}</span>
                    @endif
                </div>
              </div>

              <div class="col-sm-12">
                <div class="mb-3">
                  <label for="remarks" class="form-label">Remarks</label>
                  <textarea class="form-control" id="remarks" rows="3" name='remarks_up'>{{ old('remarks_up')}}</textarea>
                  @if ($errors->has('remarks_up'))
                      <span class='text-danger'>{{ $errors->first('remarks_up') }}</span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <p>{{ __('messages.Status')}}</p>
              </div>

              <div class="col-6 col-md-4 col-lg-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name='up_account_status'>
                  <label class="form-check-label" for="inlineCheckbox1">{{ __('messages.Active')}}</label>
                </div>
              </div>

              <div class="col-6 col-md-4 col-lg-2">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name='up_account_status' id="inlineCheckbox2" value="2">
                  <label class="form-check-label" for="inlineCheckbox2">{{ __('messages.Inactive')}}</label>
                </div>
              </div>
              @if ($errors->has('up_account_status'))
                  <span class='text-danger'>{{ $errors->first('up_account_status') }}</span>
              @endif
            </div>
          </div>

        </div>

        <div class="card">
          <div class="card-body">
            <p>Sub-account (Max. 10 Active Accounts)</p>
            <p class="btn btn-light " id='add_sub_form'>Add</p>

            <div class="resident_create_accordion">
              <div class="accordion new_id" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="fa fa-angle-down"></i>
                      <span> Sub Account</span>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label for="chinesename2" class="form-label">Chinese Name</label>
                            <input type="text" class="form-control" name="sub_chinese_name[]">
                              @if ($errors->has('sub_chinese_name'))
                                  <span class='text-danger'>{{ $errors->first('sub_chinese_name') }}</span>
                              @endif
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label for="englishname2" class="form-label">English Name</label>
                            <input type="text" class="form-control" name="sub_english_name[]">
                              @if ($errors->has('sub_english_name'))
                                  <span class='text-danger'>{{ $errors->first('sub_english_name') }}</span>
                              @endif
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                          <div class="row">
                            <div class="col-12">
                              <label for="Unit" class="form-label">Contact Number</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-sm-2">
                              <select class="minimal form-select" id='sub_country_code' name='sub_country_code[]'>
                                <option value=" ">Code</option>
                              @foreach($countryCode as $subcode)
                                <option value="{{ $subcode}}">{{ $subcode}}</option>
                              @endforeach
                               
                              </select>
                              
                            </div>
                            <div class="col-12 col-sm-10">
                              <input type="text" class="form-control" name="sub_unit_text[]">
                              
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-12 col-lg-6">
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="Email" name="sub_unit_email[]">
                              @if ($errors->has('sub_unit_email'))
                                  <span class='text-danger'>{{ $errors->first('sub_unit_email') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label for="remarks" class="form-label">Reamrks (Show to management app ONLY)</label>
                            <textarea class="form-control" name='sub_remarks[]'rows="3"></textarea>
                              @if ($errors->has('sub_remarks'))
                                  <span class='text-danger'>{{ $errors->first('sub_remarks') }}</span>
                              @endif
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12">
                          <p>Status</p>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sub_status[]" value="1">
                            <label class="form-check-label" for="inlineCheckbox1">Active</label>
                          </div>
                        </div>

                        <div class="col-6 col-md-4 col-2">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sub_status[]" value="0">
                            <label class="form-check-label" for="inlineCheckbox2">Inactive</label>
                          </div>
                        </div>
                        @if ($errors->has('sub_status'))
                            <span class='text-danger'>{{ $errors->first('sub_status') }}</span>
                        @endif
                      </div>

                    </div>
                  </div>
                  <div id='append_sub_form'></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <a href="{{ route('resident.index')}}" class="btn btn-secondary">Cancel</a>
        <button type='submit' name='submit' class="btn btn-success">Save</button>
      </div>
    </div>
    
  </div>
  
</div>
</div>
</div>
</form>
  </section>




</main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    var unique_id_sub_form = 1;
    var index = 0;

    var coutryCode = <?php echo json_encode($countryCode); ?>;
   
    $("#add_sub_form").click(function() {
      if(index <=9 ){

      
      unique_id_sub_form++;
      index++;
        $('#append_sub_form').append('<div class="accordion-item" id="delete_sub_form">' +'<h2 class="accordion-header" id="headingThree">' +'<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"data-bs-target="#collapseThree' + unique_id_sub_form + '" aria-expanded="false" aria-controls="collapseThree' + unique_id_sub_form + '">' +
          '<i class="fa fa-angle-down">' +
          '</i>Sub Account</button></h2>' +
          '<div id="collapseThree' + unique_id_sub_form + '" class="accordion-collapse collapse" aria-labelledby="headingThree"data-bs-parent="#accordionExample">' +
          '<div class="accordion-body">' +
          '<div class="row">' +
          '<div class="col-sm-6">' +
          '<div class="mb-3">' +
          '<label class="form-label">Chinese Name</label>' +
          '<input type="text" class="form-control"  name="sub_chinese_name[' + index + ']">' +
          '</div>' +
          '</div>' +
          '<div class="col-sm-6"><div class="mb-3">' +
          '<label for="englishname2" class="form-label">English Name</label>' +
          '<input type="text" class="form-control"  name=sub_english_name[' + index + ']>' +
          '</div>' +
          '</div>' +
          '<div class="col-sm-6 col-md-12 col-lg-6">' +
          '<div class="row">' +
          '<div class="col-12">' +
          '<label for="Unit" class="form-label">Unit</label>' +
          '</div>' +
          '</div>' +
          '<div class="row">'+'<div class="col-sm-2 col-md-2 col-lg-2">'+
            '<select class="minimal form-select" id="sub_country_code'+index+'" name="sub_country_code['+index+']">'+
            '<option value="">Select Code</option>'+
            ''+
            '</select>'+
          '</div>'+
          '<div class="col-sm-10 col-md-10 col-lg-10">'+
          '<input type="text" class="form-control" name="sub_unit_text['+index+']"></div>'+
          '</div></div><div class="col-sm-6 col-md-12 col-lg-6">'+
          '<div class="mb-3">'+
          '<label for="email" class="form-label">Email</label>'+
          '<input type="email" class="form-control" name="sub_unit_email['+index+']">'+
          '</div></div>'+
          '<div class="col-sm-12">'+
          '<div class="mb-3">'+
          '<label for="remarks" class="form-label">Reamrks (Show to management app ONLY)</label><textarea class="form-control"  name="sub_remarks['+index+']" rows="3">'+
          '</textarea></div>'+
          '</div>'+
          '</div><div class="row mt-3">'+
          '<div class="col-12"><p>Status</p></div>'+
          '<div class="col-6 col-md-4 col-lg-2">'+
          '<div class="form-check form-check-inline">'+
          '<input class="form-check-input" type="radio" name="sub_status['+index+']" value="1">'+
          '<label class="form-check-label" for="inlineCheckbox1">Active</label>'+
          '</div></div><div class="col-6 col-md-4 col-2"><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="sub_status['+index+']" value="0">'+'<label class="form-check-label" for="inlineCheckbox2">Inactive</label></div>'+
          '</div><div class="col-12 col-md-4 col-2">'+
          '<div class="dlt_acc"><i class="fa fa-trash">'+
          '</i><a href="javascript:void(0)" class="text-danger programings_btn_remove"> Delete Sub Account</a></div></div></div></div></div></div>');
          
              $.each(coutryCode, function(key, value) {
                $('#sub_country_code'+index+'').append('<option value="' + value + '">' + value + '</option>');
              });
         

        }else{
          alert('You can not add More than 10 sub accounts.');
        }
    });

    $(document).on('click', '.programings_btn_remove', function() {
      $(this).closest('div#delete_sub_form').remove();
    });


    //floor data get
    $("#select_tower").change(function() {
      var id = $('#select_tower').val();
      $.ajax({
        type: 'get',
        url: '{{ url("get_flor") }}' + '/' + id,
        data: {},
        success: function(flor) {
          $('#select_floor').html('');
          $('#select_floor').append('<option value="null">please select</option>');
          $.each(flor, function(key, value) {
            $("#select_floor").append('<option value="' + value
              .id + '">' + value.floar_name + '</option>');
          });
        }
      });
    });

    //get units data
    $("#select_floor").change(function() {
      var floar_id = $('#select_floor').val();
      $.ajax({
        type: 'get',
        url: '{{ url("get_unit") }}' + '/' + floar_id,
        data: {},
        success: function(unitData) {
          $('#select_unit').html('');
          $('#select_unit_data').html('');
          $('#select_sub_unit').html('');
          $('#select_unit').append('<option value="null">please select</option>');
          $('#select_unit_data').append('<option value="null">please select</option>');
          $('#select_sub_unit').append('<option value="null">please select</option>');
          $.each(unitData, function(key, value) {
            $("#select_unit").append('<option value="' + value.id + '">' + value.unit_name + '</option>');
            $("#select_unit_data").append('<option value="' + value.id + '">' + value.unit_name + '</option>');
            $("#select_sub_unit").append('<option value="' + value.id + '">' + value.unit_name + '</option>');
            
          });
        }
      });



    });
  });
</script>

@endsection