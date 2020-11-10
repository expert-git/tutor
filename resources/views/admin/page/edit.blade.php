@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Panel
        <small>- Edit Page</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
     <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Page</h3>
                @include('admin.partials.error_section')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('pages.update', ['id' => $page->id])}}"  method="post">
              {{ method_field('PUT') }}
              <div class="box-body">
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Name</label>
                  <input type="text" class="form-control" name="heading" id="" placeholder="Enter Page name" value="{{$page->heading}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Content</label>
                      <textarea name="content" id="editor1" rows="10" cols="60">{{$page->content}}</textarea>        
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="title" id="" value="{{$page->title}}" rows="10" cols="60"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Meta</label>
                  <input name="meta" id="" rows="10" value="{{$page->meta}}" cols="60"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <br>
                  <textarea name="tags" class="form-control" id="editor4" rows="10" cols="60">{{$page->tags}}</textarea>                      
                </div>              


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <button type="submit" class="btn btn-primary">Edit Page</button>
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

@section('custom-script')
<script type="text/javascript">
    $(document).ready(function(){
        CKEDITOR.replace( 'editor1' );
    })

</script>


@endsection