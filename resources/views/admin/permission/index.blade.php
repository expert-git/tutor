@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permission Panel
        <small>- Permission </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permission list</h3>
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
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($permissions as $permission)
                      <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->display_name}}</td>
                        <td>{{$permission->description}}</td>
                        <td class="action-list">
                       
                           <a href="{{route('permissions.edit', ['id' => $permission->id])}}"><button type="button" class="btn btn-info">Edit</button></a>                        
                         

                        
                         
                            <form id="deleteUser" action="{{route('permissions.destroy', ['id' => $permission->id])}}" method="post">
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