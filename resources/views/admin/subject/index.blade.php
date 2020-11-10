@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Subject Panel
        <small>- Subjects </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Subject list</h3>
              <button type="button" class="btn btn-default pull-right editAddSubjectModal" data-flag="add" data-toggle="modal" data-target="#editAddSubjectModal" ><i class="fa fa-plus"></i> Add Subject</button>
                <br>
                             
            </div>          
            @include('admin.partials.error_section') 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="subjectTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Subject Code</th>
                      <th>Grade</th>
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subjects as $subject)
                      <tr>
                        <td>{{$subject->subject}}</td>
                        <td>{{$subject->subject_code}}</td>
                        <td>{{$subject->grade}}</td>

                        <td>
                          <!-- Edit Subject -->
                          <button type="button" data-url="{{route('edit_subj_data')}}" class="btn btn-info editAddSubjectModal" data-toggle="modal" data-flag="edit" data-id="{{$subject->id}}" data-target="#editAddSubjectModal">Edit</button>
                          
                          <!-- Delete Subject -->
                          <a href="{{route('delete_subject', ['id' => $subject->id])}}"><button type="button" class="btn btn-danger" data-id="{{$subject->id}}">Delete</button></a>
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

<!-- Subject Edit Modal -->
<div class="modal fade" id="editAddSubjectModal" tabindex="-1" role="dialog" 
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
                        <span class="subjModalHeading"></span> Subject
                    </h4>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    
                    <form role="form" id="editAddSubject" action="{{route('subject_submit')}}">
                      <div class="form-group">
                        <label for="task">Subject</label>
                          <input type="text" class="form-control"
                          id="subject" name="subject" required />
                      </div>

                      <div class="form-group">
                        <label for="task">Subject Code</label>
                          <input type="text" class="form-control"
                          id="subject_code" name="subject_code" required />
                          <input type="hidden" name="edit_subj_id" id="edit_subj_id" value="">
                      </div>

                      <div class="form-group">
                        <label for="task">Grade</label>
                          <select class="form-control" name="grade_name" >
                            <option value="" disabled>Select</option>
                            @foreach($grades as $grade)
                              <option value="{{$grade->id}}">{{$grade->grade}}</option>
                            @endforeach
                          </select>
                      </div>           
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <span class="subjModalHeading"></span> Subject
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection