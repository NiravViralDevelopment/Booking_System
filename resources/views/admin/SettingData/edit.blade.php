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
                <h3 class="card-title">Setting</h3>
              </div>
              <form action="{{route('setting.update',$data->id)}}" method="POST" enctype="multipart/form-data">@csrf
              {{ method_field('PATCH') }}   
                <div class="card-body">
                  <div class='row'>
                    <div class='col-12'>
                      
                       

                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" placeholder='title' value='{{ $data->title}}'>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Details</label>
                            <textarea type="text" class="form-control" name="details" placeholder='details'>{{ $data->details}}</textarea>
                        </div>

                        @if($data->image)
                        <div class="form-group">
                            <img src="{{ asset('all_image/'.$data->image)}}" width="50" height="50" alt="">
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control" name="image" placeholder='details'>
                        </div>
                    
                    </div>
                </div>
              </div>
                
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                  <a href="{{ route('setting.index') }}" class="btn btn-danger ">{{ __('messages.Back')}}</a>
              </div>
              
            </form>
          </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    



@endsection