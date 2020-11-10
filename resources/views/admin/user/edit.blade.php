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

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
                @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="{{route('users.update', ['id' => $user->id])}}"  method="post">
              {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" name="first_name" id=""  value="{{$user->first_name}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" name="last_name" id=""  value="{{$user->last_name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputUsername" value="{{$user->username}}" placeholder="Enter username">
                </div>
               <div class="form-group">
                  <label for="">Phone no</label>
                  <input type="text" class="form-control" name="phone_no" id="" value="{{$user->phone_no}}" placeholder="Enter phone no">
                </div>                

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="{{$user->email}}" id="exampleInputEmail2" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input type="text" class="form-control" name="admin-password" value="">
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
                  <br>
                  <input type="text" name="tution_per_hour" id="exampleInputRate" value="{{ isset($profile->tution_per_hour) ? $profile->tution_per_hour : '' }}" class="span3 form-control" >
                </div>

                <div class="form-group profile_form">
                  <label for="Bio">Bio </label>
                  <br>
                  <textarea name="bio" class="span3 form-control" >{{$profile->bio}}</textarea>
                </div>

                <div class="form-group profile_form">

                  <label for="exampleInputGender">Gender<span>*</span></label>
                  <br>
                  <select name="gender" class="form-control">
                    <option value="male" @if($user->gender=="male") selected @endif>Male</option>
                    <option value="female" @if($user->gender=="female") selected @endif>female</option>
                  </select>                  
     
                </div>
                <div class="form-group profile_form">
                  <label for="exampleInputage">Age<span>*</span></label>
                  <br>
                  <input type="text" name="age" id="exampleInputage" value="{{$profile->age}}" class="form-control span3" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">User role</label>
                  <select name="user_role"  class="form-control">
                    @foreach($roles as $role)
                     <option value="{{$role->id}}" @if($role->id==$user->role_id) selected @endif>{{$role->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Statuses</label>
                  <select name="status_id"  class="form-control">
                    @foreach($statuses as $status)
                     <option value="{{$status->id}}" @if($status->id == $user->status_id) selected @endif>{{$status->status}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Email Verification</label>

                  <input type="radio"  name="verified" value="1" @if($user->verified == 1) checked @endif> Verify 
                  <input type="radio" name="verified" value="0" @if($user->verified == 0) checked @endif> unverify<br>
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