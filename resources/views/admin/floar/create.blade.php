@extends('admin.app_master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="col-sm-6">
           <h4>Flor</h4>
            </div>
            <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">General Form</li>
              </ol>
            </div> -->
      </div>
</section>

@if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <form action="{{route('floar.store')}}" method="POST">
                @csrf

                <div class="card-body">
                  <div class='row'>

                    <div class='col-6'>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Tower <span class='text-danger'>*</span></label>
                        <select name="select_tower" class='form-control' id="">

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
                        <label for="flor_name">Flor Name<span class='text-danger'>*</span></label>
                        <input type="text" class="form-control" id='flor_name' name="flor_name" placeholder='English Flor Name'>
                          @if ($errors->has('flor_name'))
                            <p class="text-danger">{{$errors->first('flor_name')}}</p>
                          @endif
                      </div>
                    </div>


                  
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