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

      <div class="col-xs-12 user_info ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title s-box-title">Application Detail</h3>
              @include('admin.partials.error_section')
          </div>
          <!-- /.box-header -->
          <div class="row s_user_info">
            <div class="col-md-6 col-xs-12">
              <p>
                <span>
                  <i class="fa fa-user"></i> Full Name :
                </span>
                <span>{{$details->full_name}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-envelope"></i> Email :
                </span>
                <span>{{$details->email_address}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-child"></i> Age :
                </span>
                <span>{{$details->age}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-graduation-cap"></i> Education :
                </span>
                <span>{{$details->education}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-transgender"></i> Gender :
                </span>
                <span>{{$details->gender}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-phone"></i> Contact No :
                </span>
                <span>{{$details->contact_num}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-credit-card"></i> ID Number :
                </span>
                <span>{{$details->id_num}}</span>
              </p>
            </div>
            <div class="col-md-6 col-xs-12">
              <p>
                <span>
                  <i class="fa fa-map-marker"></i> Location :
                </span>
                <span>{{$details->location}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-home"></i> Job City :
                </span>
                <span>{{$details->job_city}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-recycle"></i> Shift :
                </span>
                <span>{{$details->shift}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-tasks"></i> Source :
                </span>
                <span>{{$details->source}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-language"></i> Language :
                </span>
                <span>{{$details->language}}</span>
              </p>
              <p>
                <span>
                  <i class="fa fa-file"></i> Resume :
                </span>
                <span><a href="{{route('get_resume',['id'=>$details->id])}}">(Download) {{$details->resume}}</a></span>
              </p>
            </div>
            <div class="col-md-12">
              <p>
                <span>
                  <i class="fa fa-file-text-o"></i>Job Description :
                </span>
                <span>{!!$details->job_desc!!}</span>
              </p>
            </div>
          </div><br>

</div>
</div>
</section>
<!-- /.content -->
</div>
@endsection
