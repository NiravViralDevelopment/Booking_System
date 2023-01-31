@extends('admin.app_master')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Floar List</h1> -->
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Floar </li>
            </ol>
          </div> -->

        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Floar </h3>
               <a href="{{ route('floar.create') }}" class='float-right btn btn-primary btn-sm'>Add </a>
            </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr no.</th>
                    <th>Tower name</th>
                    <th>Floar name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $p)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$p->tower_name}}</td>
                        <td>{{$p->floar_name}}</td>
                        <td>
                            <a href="{{route('floar.edit',$p->id)}}" class='btn btn-success btn-sm'>Edit</a>
                            <a href="{{route('floar.destroy',$p->id)}}"  onclick="return confirm('Are you sure?');" class='btn btn-danger btn-sm'>Delete</a>
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