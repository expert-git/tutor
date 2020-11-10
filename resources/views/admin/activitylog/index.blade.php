@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Activity Log
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Logs</h3>
                @include('admin.partials.error_section')              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="activityTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Action</th>
                      <th>IP Address</th>                      
                      <th>Time</th>                    
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($activity_logs as $activity_log)
                      <tr>
                        <td>{{$activity_log->first_name}}</td>
                        <td>{{$activity_log->text}}</td>
                        <td>{{$activity_log->ip_address}}</td>
                        <td>{{ date("D, d M-y H:i:s",strtotime($activity_log->created_at)) }}</td>
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