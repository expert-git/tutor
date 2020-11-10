@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Panel
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
           <div class="row">
              <div class="col-md-6">
                <!-- general form elements -->

                  <div class="box box-primary user_info">
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                      <p>
                        <span>
                          <i class="fa fa-user"></i> Name :
                        </span>
                        <span>{{ $user->name }}</span>
                      </p>
                      <p>
                        <span>
                          <i class="fa fa-envelope"></i> Email :
                        </span>
                        <span>{{ $user->email }}</span>
                      </p>
                      <p>
                        <span>
                          <i class="fa fa-tasks"></i> Role :
                        </span>
                        <span>{{ $user->display_name }}</span>
                      </p>
                      <p>
                        <span>
                          <i class="fa fa-users"></i> User Name :
                        </span>
                        <span>{{ $user->username }}</span>
                      </p>
                      <p>
                        <span>
                          <i class="fa fa-plus-square"></i> Bio :
                        </span>
                        <span>{{ $user->bio }}</span>
                      </p>
                      <p>
                        <span>
                          <i class="fa fa-clock-o"></i> Tution Per Hour :
                        </span>
                        <span>{{ $user->tution_per_hour }}</span>
                      </p>
                      <p>
                        <span>
                          <i class="fa fa-transgender"></i> Gender :
                        </span>
                        <span>{{ $user->gender }}</span>
                      </p>

                    </div>
                    </div>
                  </div>
                <!-- /.box -->

              </div>

            </div>
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
