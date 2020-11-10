@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permission Panel
        <small>- Add Permission</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Permission</h3>
              @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{route('permissions.store')}}" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Permission Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Permission name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Permission Display name</label>
                    <input type="text" class="form-control" name="display_name" id="exampleInputEmail2" placeholder="Enter Permission display name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Permission Description</label>
                    <input type="text" class="form-control" name="description" id="exampleInputPassword3" placeholder="Description">
                  </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <input type="hidden" name="_token" value="{{Session::token()}}">
                  <button type="submit" class="btn btn-primary">Add Permission</button>
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