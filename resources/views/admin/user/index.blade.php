@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Panel
        <small>- Users </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List</h3>
                @include('admin.partials.error_section')              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Account</th>
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->display_name}}</td>
                        <td>{{$user->status}}</td>
                        <td>@if($user->verified == 1) Verified @elseif ($user->verified == 0) unVerified @endif</td>
                        <td><a href="{{route('users.edit', ['id' => $user->id])}}"><button type="button" class="btn btn-info">Edit</button></a>
                        <a href="{{route('users.show', ['id' => $user->id])}}"><button type="button" class="btn btn-info f_view">View</button></a>
                        <form id="deleteUser" onsubmit="return confirm('Do you really want to delete?')" action="{{route('users.destroy', ['id' => $user->id])}}" method="post" class="f_form">
                          {{ method_field('DELETE') }}
                          <input type="hidden" name="_token" value="{{Session::token()}}">
                          <button type="submit" class="btn btn-danger f_view">Delete</button>
                        </form>

                        </td>
                      </tr>                
                    @endforeach              
                  </tbody>

              </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection