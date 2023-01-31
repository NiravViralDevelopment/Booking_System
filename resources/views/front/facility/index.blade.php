@extends('front.app_master')

@section('content')

<main id="main" class="main">
    <div class="row">
      <div class="col-sm-6">
        <div class="pagetitle">
          <h1>Facility</h1>
        </div>
      </div>

      <div class="col-sm-6">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Elements</li>
          </ol>
        </nav>
      </div>
    </div>
    
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                <a href="{{ route('facility.create')}}" class="btn btn-success">Create</a>
              </h5>

              <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <label for="filterfacility" class="form-label">Filter</label>
                    <input type="text" class="form-control" id="myInputTextFieldFront" placeholder="Search">
                  </div>

                  <div class="col-sm-6">
                    <label for="active" class="form-label">Active</label>
                    <select class="minimal form-select" id='statusFilter'>
                      <option value=''>All</option>
                      <option value='Active'>Active</option>
                      <option value='In-Active'>In-Active</option>
                    </select>
                  </div>

                  <div class="col-sm-6">
                    <label for="active" class="form-label">Order By</label>
                    <select class="minimal form-select">
                      <option>Updated At</option>
                      <option>Created At</option>
                    </select>
                  </div>
                </div>
                 
              
              <div class="row">
                <div class="col-sm-12 my-3">
                  <a href="#" class="btn btn-success btn-export" id='ExportReporttoExcel'>Export</a>
                </div>

                <hr>

                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-responsive" id='front_example'>
                      <thead>
                        <tr class="table_header">
                          <th scope="col">Sr.no.</th>
                          <th scope="col">Title</th>
                          <th scope="col">Quota
                            Per Facility</th>
                          <th scope="col">Quota
                            Per Session</th>
                          <th scope="col">Updated At</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Active</th>
                          <th class="not-export-column" scope="col">Edit</th>
                          <th class="not-export-column" scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $key=>$row)
                          <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $row->title}}</td>
                            <td>{{ $row->quota_per_facility}}</td>
                            <td>{{ $row->quota_per_session}}</td>
                            <td>{{ date_format($row->created_at,"d-m-Y   H:i"); }}</td>
                            <td>{{ date_format($row->updated_at,"d-m-Y   H:i"); }}</td>
                            <td>
                              @if($row->status == 1)
                                <i class="fa fa-check"></i>
                                <span class='d-none'>Active</span>
                              @else
                                <i class="fa fa-pause-circle-o"></i>
                                <span class='d-none'>In-Active</span>
                              @endif
                              </td>
                            <td>
                              <a href="{{ route('facility.edit',$row->id)}}">
                                <i class="fa fa-pencil-square-o"></i>
                              </a>
                            </td>

                              <td><a href="{{ route('facility_delete',$row->id)}}" onclick="return confirm('Are you sure you want to delete this ?');"><i class="fa fa-trash text-danger"></i></a></td>
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
@endsection