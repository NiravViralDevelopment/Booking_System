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
                <h3 class="card-title">Unit</h3>
               <a href="{{ route('unit.create') }}" class='float-right btn btn-primary btn-sm' >{{ __('messages.Add')}}</a>
            </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ __('messages.Sr no.')}}</th>
                    <th>Tower</th>
                    <th>Floar</th>
                    <th>Unit Name</th>
                    <th>{{ __('messages.Action')}}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data  as $row)
                      <tr>
                        <td>{{ $row->id}}</td>
                        <td>{{ $row->tower_name}}</td>
                        <td>{{ $row->floar_name}}</td>
                        <td>{{ $row->unit_name}}</td>
                        <td>
                            <a href="{{ route('unit.edit',$row->id)}}" class='btn btn-success btn-sm'>{{ __('messages.Edit')}}</a>
                            <a href="{{ route('unit.destroy',$row->id)}}"  onclick="return confirm('Are you sure?');" class='btn btn-danger btn-sm'>{{ __('messages.Delete')}}</a>
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