@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Test Panel
        <small>- Add Test</small>
      </h1>
    </section>
    @include('partials.error_section')
    @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">test List</h3>
                @include('admin.partials.error_section')              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	@if(Session::has('message'))
             <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
              <table class="data_table_apply table-bordered display" width="100%" data-page-length="10" class="table table-dark">
          <thead>
            <tr>
               <th>#</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
          	@foreach ($gettest_list as $key => $value)
          	<tr>
          	 <td>{{ ++$key }}</td>
          	  <td>{{ $value->question }}</td>
          	  <td><a href="{{route('test-delete', $value->id)}}"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>
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
