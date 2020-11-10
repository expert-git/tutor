@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Request Panel
        <small>- Job Requests </small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
     <div class="row">


      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job Request list</h3>
            <!--   <button type="button" class="btn btn-default pull-right editAddJobRequestModal" data-flag="add" data-toggle="modal" data-target="#editAddJobRequestModal" ><i class="fa fa-plus"></i> Add Subject</button> -->
                <br>
                @include('admin.partials.error_section')              
            </div>          

            <!-- /.box-header -->
            <div class="box-body">
              <table id="subjectTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Tutor Name</th>
                      <th>Job Title</th>
                      <th>Job Description</th>                    
                      <th>Request Status</th>                    
                      <th>Action</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($job_boards as $value)
                      <tr>
                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->details}}</td>
                        <td>{{$value->request_status}}</td>
                        <td>
                          <!-- Edit Subject -->
                        <!--   <button type="button" data-url="{{route('edit_job_request')}}" class="btn btn-info editAddJobRequestModal" data-toggle="modal" data-flag="edit" data-id="{{$value->id}}" data-target="#editAddJobRequestModal">Edit</button> -->
                          
                          <!-- Delete Request -->
                          <a href="{{route('delete_job_board', ['id' => $value->id])}}">
                            <button type="button" class="btn btn-danger" data-id="{{$value->id}}">Delete</button>
                          </a>
                          <!-- Accept Request -->
                          @if($value->request_status == 1)
                            <a href="{{route('reject_job_board', ['id' => $value->id])}}">
                              <button type="button" class="btn btn-success" title="Click To Reject" data-id="{{$value->id}}">Accepted</button>
                            </a> 
                          @else
                            <a href="{{route('accept_job_board', ['id' => $value->id])}}">
                              <button type="button" class="btn btn-danger" title="Click To Accept" data-id="{{$value->id}}">Rejected</button>
                            </a> 
                          @endif
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
<!-- <div class="modal fade" id="editAddJobRequestModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> -->
                <!-- Modal Header -->
                <!-- <div class="modal-header">
                    <button type="button" class="close" 
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        <span class="subjModalHeading"></span> Subject
                    </h4>
                </div> -->
            
                <!-- Modal Body -->
              <!--   <div class="modal-body">
                    
                    <form role="form" id="editAddSubject" action="{{route('subject_submit')}}">
                      <div class="form-group">
                        <label for="task">Subject</label>
                          <input type="text" class="form-control"
                          id="subject" name="subject"/>
                      </div>

                      <div class="form-group">
                        <label for="task">Subject Code</label>
                          <input type="text" class="form-control"
                          id="subject_code" name="subject_code"/>
                          <input type="hidden" name="edit_subj_id" id="edit_subj_id" value="">
                      </div>                
                </div> -->
            
                <!-- Modal Footer -->
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <span class="subjModalHeading"></span> Subject
                    </button>
                </div> -->
       <!--       </form>
        </div>
    </div>
</div> -->
@endsection