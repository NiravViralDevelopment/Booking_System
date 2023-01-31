@extends('admin.app_master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div>
</section>

 
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">{{ __('messages.Tower')}}</h3>
              </div>
              <form action="{{route('tower.store')}}" method="POST">@csrf

                <div class="card-body">
                  <div class='row'>
                    <div class='col-6'>
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('messages.Tower Name')}} <span class='text-danger'>*</span></label>
                        <input type="text" class="form-control" name="en_tower_name" placeholder='English Tower Name'>
                          @if ($errors->has('en_tower_name'))
                            <p class="text-danger">{{ $errors->first('en_tower_name') }}</p>
                          @endif
                      </div>
                    </div>


                  <!-- <div class='col-6'>
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('messages.Tower Name')}}<span class='text-danger'>*</span></label>
                        <input type="text" class="form-control" name="ch_tower_name" placeholder='Traditional Chinese Tower Name'>
                        @if ($errors->has('ch_tower_name'))
                          <p class="text-danger">{{ $errors->first('ch_tower_name') }}</p>
                        @endif
                      </div>
                  </div> -->
              </div>
              </div>
                
              <div class="card-footer">
                <button type="submit" class="btn btn-info">{{ __('messages.Submit')}}</button>
                  <a href="{{ route('tower.index') }}" class="btn btn-danger ">{{ __('messages.Back')}}</a>
              </div>
              
            </form>
          </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    



@endsection