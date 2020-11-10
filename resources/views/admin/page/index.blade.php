@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Panel
        <small>- Pages </small>
    </h1>
</section>

<!-- Main content -->
<section class="content">    
   <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Page list</h3>
              @include('admin.partials.error_section')              
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="userTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Heading</th>
                      <th>Content</th>
                      <th>Action</th>                    
                  </tr>
              </thead>
              <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{$page->heading}}</td>
                    <td>{{$page->content}}</td>
                    <td><a href="{{route('pages.edit', ['id' => $page->id])}}"><button type="button" class="btn btn-info">Edit</button></a>


                      <a href="{{route('pages.show', ['id' => $page->id])}}"><button type="button" class="btn btn-info">Show</button></a>  

                      <form id="deleteUser" action="{{route('pages.destroy', ['id' => $page->id])}}" method="post" class="f_form">
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

