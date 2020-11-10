
@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
All Jobs
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

<th>Job Heading</th>
<th>Job City</th>
<th>Job Apply Date</th>
<th>Action</th> 
</tr>
</thead>
<tbody>
@foreach($career_job_applications as $career_job_application)
<tr> 
<td>{{$career_job_application->job_heading}}</td> 
<td>{{$career_job_application->job_city}}</td>
<td>{{$career_job_application->job_apply_date}}</td>
<td><a href="{{route('career_job_detail', ['jobid' => $career_job_application->id])}}"><button type="button" class="btn btn-info">View</button></a>
<a href="{{route('career_job_editIndex', ['jobid' => $career_job_application->id])}}"><button type="button" class="btn btn-info">Edit</button></a>
<a href="{{route('career_job_delete', ['jobid' => $career_job_application->id])}}"><button type="button" class="btn btn-danger deleteGroup">Delete</button></a></td>
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
