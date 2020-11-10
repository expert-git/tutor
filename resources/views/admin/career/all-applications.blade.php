@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Application Panel
        <small>- Application </small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
   <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Application list</h3>
              @include('admin.partials.error_section')              
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Job Name</th>
                      <th>Full Name</th>
                      <th>Gender</th>   
                      <th>ID Number</th> 
                      <th>Contact number</th>
                      <th>Detail</th>                
                  </tr>
              </thead>
              <tbody>
         
                @foreach($career_job_applications as $career_job_application)
                <tr>   
                    <td>{{$career_job_application->job_heading}}</td>
                    <td>{{$career_job_application->full_name}}</td>
                    <td>{{$career_job_application->gender}}</td>
                    <td>{{$career_job_application->id_num}}</td>
                    <td>{{$career_job_application->contact_num}}</td>
                    <td><a href="{{route('application_detail', ['appid' => $career_job_application->id])}}"> <button type="button" class="btn btn-primary">Detail</button>
                    </a>
                    </td>
            </tr>                
            @endforeach              
        </tbody>

  </table>
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection