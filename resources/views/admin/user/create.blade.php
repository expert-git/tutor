@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Panel
        <small>- Add User</small>
      </h1>
    </section>
    @include('partials.error_section')
    @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
              @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('users.store')}}" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" class="form-control" name="first_name" placeholder="Enter First name">
                </div>

                <div class="form-group">
                  <label for="">Last Name</label>
                  <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
                </div>

                <div class="form-group">
                  <label for="exampleInputUsername">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputUsername" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="">Phone no</label>
                  <input type="text" class="form-control" name="phonenum1" placeholder="Enter phone no">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                  <label for="exampleInputQualification">Qualifications</label>
                  <input type="text" class="form-control" name="qualifications" id="exampleInputqualifications" placeholder="Qualifications">
                </div>

                <div class="form-group">
                  <label for="exampleInputQualifications">Qualifications From</label>
                  <input type="text" class="form-control" name="qualification_from" id="exampleInputqualifications_form" placeholder="Qualifications From">
                </div>
                
                <div class="form-group profile_form">
                  <label for="exampleInputRate">Rates / Hour <span>*</span></label>
                  <input type="text" class="form-control span3" name="tution_per_hour" id="exampleInputRate" value="{{ isset($user->tution_per_hour) ? $user->tution_per_hour : '' }}"required>
                </div>
                <div class="form-group profile_form">
                  <label for="Bio">Bio </label>
                  <br>
                  <textarea name="bio" class="span3 form-control" ></textarea>
                </div>
                <div class="form-group profile_form">
                  <label for="exampleInputGender">Gender<span>*</span></label>
                  <select name="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">female</option>
                  </select>
                </div>
                <div class="form-group profile_form">
                  <label for="exampleInputage">Age<span>*</span></label>
                  <input type="text" name="age" id="exampleInputage" value="" class="form-control span3" required>
                </div>
                <div class="form-group"  class="form-control">
                  <label for="exampleInputPassword1">User role</label>
                  <select name="user_role" class="form-control">
                    @foreach($roles as $role)
                     <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group"  class="form-control">
                  <label for="exampleInputPassword1">Statuses</label>
                  <select name="status_id" class="form-control">
                    @foreach($statuses as $status)
                     <option value="{{$status->id}}">{{$status->status}}</option>
                    @endforeach
                  </select>
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