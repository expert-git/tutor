@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Add Panel
        <small>- Add Job</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Job</h3>
              @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('care_jobs_save')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Job Heading</label>
                  <input type="text" class="form-control" name="job_heading" id="" value="" placeholder="Enter Job Heading" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Job description</label>
                      <textarea name="job_desc" class="form-control" id="editor1" rows="10" cols="60" required></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Job Specification</label>
                      <textarea name="job_spec" class="form-control" id="editor2" rows="10" cols="60" required></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Job Qualification</label>
                    <textarea name="quaification" class="form-control" id="editor3" rows="10" cols="60" required></textarea>
                </div>         

                <div class="form-group">
                    <label for="exampleInputEmail1">Job Perks</label>
                    <textarea name="job_perks" class="form-control" id="editor4" rows="10" cols="60" required></textarea>
                </div>                                         
    
                <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" name="job_city" id="" value="" placeholder="Enter Job City" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Apply by</label>
                  <input type="date" class="form-control" name="job_apply_date" id="" value="" placeholder="Enter Job Heading" required>
                </div>                    
<!--            <div class="form-group">
                  <label for="exampleInputEmail1">Role Display name</label>
                  <input type="text" class="form-control" name="display_name" id="exampleInputEmail2" placeholder="Enter Role display name">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Role Description</label>
                  <input type="text" class="form-control" name="description" id="exampleInputPassword3" placeholder="Description">
                </div> -->

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-primary">Add Job</button>
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