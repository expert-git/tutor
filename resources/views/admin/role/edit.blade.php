@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Panel
        <small>- Edit Role</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Role</h3>
                @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="{{route('roles.update', ['id' => $role->id])}}"  method="post">
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Role Name</label>
                  <input type="text" class="form-control" name="name" id="" placeholder="Enter Role name" value="{{$role->name}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Display Name</label>
                  <input type="text" class="form-control" name="display_name" value="{{$role->display_name}}" id="" placeholder="Enter display name">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" class="form-control" name="description" value="{{$role->description}}" id="" placeholder="description">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-primary">Submit</button>
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