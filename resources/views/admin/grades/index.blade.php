@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Grade Panel
        <small>- Grades </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Grade list</h3>
              <button type="button" class="btn btn-default pull-right editAddGradeModal" data-flag="add" data-toggle="modal" data-target="#editAddGradeModal" ><i class="fa fa-plus"></i> Add Grade</button>
                <br>
                             
            </div>          
            @include('admin.partials.error_section') 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="gradeTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Grade</th>
                      <th>Grade Description</th>
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($grades as $grade)
                      <tr>
                        <td>{{$grade->grade}}</td>
                        <td>{{$grade->grade_description}}</td>

                        <td>
                          <!-- Edit grade -->
                          <button type="button" data-url="{{route('edit_grade_data')}}" class="btn btn-info editAddGradeModal" data-toggle="modal" data-flag="edit" data-id="{{$grade->id}}" data-target="#editAddGradeModal">Edit</button>
                          
                          <!-- Delete grade -->
                          <a href="{{route('delete_grade', ['id' => $grade->id])}}"><button type="button" class="btn btn-danger" data-id="{{$grade->id}}">Delete</button></a>
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

<!-- grade Edit Modal -->
<div class="modal fade" id="editAddGradeModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" 
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span class="gradeModalHeading"></span> Grade
                    </h4>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    
                    <form role="form" id="editAddGrade" action="{{route('grade_submit')}}">
                      <div class="form-group">
                        <label for="task">Grade</label>
                          <input type="text" class="form-control"
                          id="grade" name="grade" required />
                      </div>

                      <div class="form-group">
                        <label for="task">Grade Description</label>
                          <input type="text" class="form-control"
                          id="grade_description" name="grade_description" required />
                          <input type="hidden" name="edit_grade_id" id="edit_grade_id" value="">
                      </div>                
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <span class="gradeModalHeading"></span> Submit
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection