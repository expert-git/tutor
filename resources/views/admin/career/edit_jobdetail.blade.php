@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Job Panel
        <small>- Edit Job</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Job</h3>
              @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('career_job_editIndex_post')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Heading</label>
                  <input type="text" class="form-control" name="job_heading" id="" 
                  value="@if(isset($single_career_job->job_heading)){{$single_career_job->job_heading}}@endif" placeholder="Enter Job Heading">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Job description</label>
                      <textarea name="job_desc" class="form-control" id="editor1" rows="10" cols="60">@if(isset($single_career_job->job_desc)){{$single_career_job->job_desc}}@endif</textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Job Specification</label>
                      <textarea name="job_spec" class="form-control" id="editor2" rows="10" cols="60">@if(isset($single_career_job->job_spec)){{$single_career_job->job_spec}}@endif</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Job Qualification</label>
                    <textarea name="quaification" class="form-control" id="editor3" rows="10" cols="60">@if(isset($single_career_job->quaification)){{$single_career_job->quaification}}@endif</textarea>
                </div>         

                <div class="form-group">
                    <label for="exampleInputEmail1">Job Perks</label>
                    <textarea name="job_perks" class="form-control" id="editor4" rows="10" cols="60">@if(isset($single_career_job->job_perks)){{$single_career_job->job_perks}}@endif</textarea>
                </div>                                         
    
                <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" name="job_city" id="" 
                  value="@if(isset($single_career_job->job_city)){{$single_career_job->job_city}}@endif" placeholder="Enter Job City">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Apply by</label> 
                  <input type="date" class="form-control" name="job_apply_date" id="" 
                  value="@if(isset($single_career_job->job_apply_date)){{$single_career_job->job_apply_date}}@endif" placeholder="Enter Job Heading">
                </div>                    

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <input type="hidden" name="edit_job_id" value="{{$single_career_job->id}}">
                <button type="submit" class="btn btn-primary">Edit Job</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


@section('custom-script')
<script type="text/javascript">
    $(document).ready(function(){
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' ); 
        CKEDITOR.replace( 'editor4' );
    })

</script>


@endsection