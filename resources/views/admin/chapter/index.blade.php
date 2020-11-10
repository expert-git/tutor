@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chapters Panel
        <small>- Chapters </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Chapters list</h3>
              <button type="button" class="btn btn-default pull-right editAddChapterModal" data-flag="add" data-toggle="modal" data-target="#editAddChapterModal" ><i class="fa fa-plus"></i> Add Chapter</button>
                <br>
                             
            </div>          
            @include('admin.partials.error_section') 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="subjectTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Chapter</th>
                      <th>Subject</th>
                      <th>Grade</th>
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($chapters as $chapter)
                      <tr>
                          <td>{{$chapter->chapter_name}}</td>
                        <td>{{$chapter->subject}}</td>
                        <td>{{$chapter->grade}}</td>

                        <td>
                          <!-- Edit Subject -->
                          <button type="button" data-url="{{route('edit_chapter_data')}}" class="btn btn-info editAddChapterModal" data-toggle="modal" data-flag="edit" data-id="{{$chapter->id}}" data-target="#editAddChapterModal">Edit</button>
                          
                          <!-- Delete Subject -->
                          <a href="{{route('delete_subject', ['id' => $chapter->id])}}"><button type="button" class="btn btn-danger" data-id="{{$chapter->id}}">Delete</button></a>
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
<div class="modal fade" id="editAddChapterModal" tabindex="-1" role="dialog" 
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
                        <span class="subjModalHeading"></span> Chapter
                    </h4>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    
                    <form role="form" id="editAddSubject" action="{{route('chapter_submit')}}">
                        <div class="form-group">
                        <label for="task">Grade</label>
                          <select class="form-control" name="grade_id" id="grade"  data-url="{{route('get_grade_subjects')}}">
                            <option value="">Select</option>
                            @foreach($grades as $grade)
                              <option value="{{$grade->id}}">{{$grade->grade}}</option>
                            @endforeach
                          </select>
                      </div> 
                      <div class="form-group">
                        <label for="task">Subject</label>
                          <select class="form-control" name="subject_id" id="subject" data-url="{{route('get_subject_chapters')}}">
                            <option value="">Select</option>
                          </select>
                      </div> 
                      <div class="form-group">
                        <label for="task">Chapter</label>
                          <input type="text" class="form-control"
                          id="chapter_name" name="chapter_name" required />
                      </div>

                                
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <span class="subjModalHeading"></span> Chapter
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection