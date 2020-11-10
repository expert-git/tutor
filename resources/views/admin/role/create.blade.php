@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Panel
        <small>- Add Role</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Role</h3>
              @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('roles.store')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Role Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Role name">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Role Display name</label>
                  <input type="text" class="form-control" name="display_name" id="exampleInputEmail2" placeholder="Enter Role display name">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Role Description</label>
                  <input type="text" class="form-control" name="description" id="exampleInputPassword3" placeholder="Description">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-primary">Add Role</button>
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