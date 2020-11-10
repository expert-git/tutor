@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Panel
        <small>- Roles </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Roles list</h3>
                @include('admin.partials.error_section')              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Display name</th>
                      <th>Description</th>
                      <th>Permission assignment</th>
                      <th>Assign Role</th>
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($roles as $role)
                      <tr>
                        <td>{{$role->name}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>{{$role->description}}</td>
                        @if(count($role->permissions) > 0)
                          <td>
                          @foreach($role->permissions as $permission)
                            {{$permission->name}}<button type="button" class="close permissionDel f_cross" data-role="{{$role->id}}" data-url="{{route('assign-permission-del')}}" value="{{$permission->id}}"  aria-label="Close">
                                  x
                                </button>
                                <br>
                          @endforeach
                          </td>
                        @else
                          <td> - </td>
                        @endif
                        @if(isset($permissions))
                         <td>
                          <select name="permission" class="permission f_permission">
                              @foreach($permissions as $permission)
                               <option data-role="{{$role->id}}" data-url="{{route('assign-permission-post')}}" value="{{$permission->id}}">{{$permission->display_name}}</option>
                              @endforeach
                          </select>
                         </td>
                        @endif
                        <td class="action-list"> <a href="{{route('roles.edit', ['id' => $role->id])}}"><button type="button" class="btn btn-info">Edit</button></a>
                          <form id="deleteUser" action="{{route('roles.destroy', ['id' => $role->id])}}" method="post">
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
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