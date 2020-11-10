@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Panel
        <small>- Add Page</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                <!-- general form elements -->

                    <h1 class="box-title">Page Details</h1>

                  <!-- /.box-header -->
                  <!-- form start -->
                  <h3>{{$page->heading}}</h3>
                    <br>
                  {!!$page->content!!}

                <b>Title:</b> {{$page->title}}
                <br>
                <b>Meta:</b> {{$page->meta}}
                <br>            
                <b>Description:</b> {{$page->tags}}
                <br>

              </div>
            </div>
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection