@extends('admin.app_master')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Setting</h3>
               <a href="{{ route('setting.create') }}" class='float-right btn btn-primary btn-sm' >{{ __('messages.Add')}}</a>
            </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Key</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Image</th>
                    <th>{{ __('messages.Action')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $p)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->details}}</td>
                        <td><img src="{{ asset('all_image/'.$p->image)}}" width="50" height="50" alt=""></img></td>
                        <td>
                            <a href="{{route('setting.edit',$p->id)}}" class='btn btn-success btn-sm'>{{ __('messages.Edit')}}</a>
                            <a href="{{route('setting_delete',$p->id)}}"  onclick="return confirm('Are you sure?');" class='btn btn-danger btn-sm'>{{ __('messages.Delete')}}</a>
                        </td>
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
  </div>

@endsection