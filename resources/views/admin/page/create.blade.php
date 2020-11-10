@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Panel
        <small>- Add Page</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Page</h3>
              @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('pages.store')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Heading</label>
                  <input type="text" class="form-control" name="heading" id="" value="" placeholder="Enter Page Heading">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Content</label>
                      <textarea name="content" class="form-control" id="editor1" rows="10" cols="60"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" name="title" id="" rows="10" cols="60"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Meta</label>
                      <input name="meta" class="form-control" id="" rows="10" cols="60"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <br>
                      <textarea name="tags" class="form-control" id="editor2" rows="10" cols="60"></textarea>
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
                <button type="submit" class="btn btn-primary">Add Page</button>
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
    })

</script>


@endsection