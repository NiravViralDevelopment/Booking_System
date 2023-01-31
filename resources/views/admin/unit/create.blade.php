@extends('admin.app_master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="col-sm-6">
           <h4>Unit</h4>
            </div>
            
      </div>
</section>


 <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <form action="{{route('unit.store')}}" method="POST">
                @csrf

                <div class="card-body">
                  <div class='row'>

                    <div class='col-6'>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Tower <span class='text-danger'>*</span></label>
                        <select name="select_tower" class='form-control' id="select_tower">

                          <option value="" >Select Towers</option>
                            @foreach($data as $row)
                              <option value="{{ $row->id}}">{{ $row->tower_name}}</option>
                            @endforeach
                        
                          </select>
                          @if ($errors->has('select_tower'))
                            <p class="text-danger">{{ $errors->first('select_tower') }}</p>
                          @endif
                      </div>
                    </div>

                    <div class='col-6'>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Tower <span class='text-danger'>*</span></label>
                        <select name="select_flor" class='form-control' id="select_flor">
                            <option value="">Select Value</option>
                        </select>
                            @if ($errors->has('select_flor'))
                                <p class="text-danger">{{ $errors->first('select_flor') }}</p>
                            @endif
                        </div>
                    </div>


                    <div class='col-6'>
                      <div class="form-group">
                        <label for="flor_name">Unit Name<span class='text-danger'>*</span></label>
                        <input type="text" class="form-control" id='unit_name' name="unit_name" placeholder='English Unit Name'>
                          @if ($errors->has('unit_name'))
                            <p class="text-danger">{{$errors->first('unit_name')}}</p>
                          @endif
                      </div>
                    </div>


                  
              </div>
              </div>
                
              <div class="card-footer">
                <button type="submit" class="btn btn-info">{{ __('messages.Submit')}}</button>
                  <a href="{{ route('unit.index') }}" class="btn btn-danger ">{{ __('messages.Back')}}</a>
              </div>
              
            </form>
          </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    



@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

   
    $( document ).ready(function() {

        $("#select_tower" ).change(function() {
            var id = $('#select_tower').val();
            $.ajax({
            type:'get',
            url: '{{ url("get_flor") }}'+'/'+id,
            data:{},
                success:function(flor){
                    
                    $.each(flor, function (key, value) {
                            console.log(value);
                            $("#select_flor").append('<option value="' + value
                                .id + '">' + value.floar_name + '</option>');
                    });
                }
            });
        });
    
    });

    

</script>