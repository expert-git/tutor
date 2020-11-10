@extends('app')
@section('content')
<section class="findtutoring_job">
   <div class="container">
   <div class="row">
      <div class="col-md-3">
         <h3 class="f_tutor">Filters</h3>
         <form method="get" action="{{route('filter_jobs')}}">
            {{csrf_field()}}
            <div class="form-group">
               <label for="course" class="f_course">Course</label>
               <select class="form-control select_f" id="course" name="courseform">
                  <option value="" selected>Select Course</option>
                  @foreach($subjects as $subject)
                  <option value="{{$subject->id}}">{{$subject->subject}}</option>
                  @endforeach
               </select>
            </div>
            <div class="form-group">
                <label for="exampleInputcountry" class="f_label">Country</label>
                <select class="form-control select_f" id="country" name="country"  data-url="{{route('filter_register.ajax')}}">
                     <option value="" selected>Select Country</option>
                         @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                         @endforeach
                </select>
            </div>
            <div class="form-group">
                  <label for="exampleInputstate" class="f_label">City</label>
                  <select class="form-control select_f" id="city" name="city">
                     
                     <div id="cityDropdown">
                      <option value="">Select City</option>      
                     </div>
                  </select>
               </div>

            <div class="form-group">
               <label for="type" class="f_course">Type</label>
               <select class="form-control select_f" id="type"  name="typeform">
                  <option value="" selected>Select Type</option>
                  @foreach($lesson_types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                  @endforeach
               </select>
            </div>
            <input type="submit" name="submit">
         </form>
      </div>
      <div class="col-md-8 col-md-offset-1">

     @if (session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
     @endif

         @include('partials.error_section')
         <h3 class="f_lefttutor">{{ count($all_jobs) }} Tutoring jobs</h3>
         @foreach($all_jobs as $jobs)
         <div class="row f_mainborder">
            <div class="col-md-9">
               <h3 class="f_course">{{$jobs->title}}</h3>
               <p class="f_findcontent">{{$jobs->details}}</p>
               <a href="#" class="f_detail">Show Details</a>
               <p class="f_posted">- Posted by <a href="{{route('tutor_profile',['name'=>$jobs->user_id])}}">{{$jobs->first_name}} {{$jobs->last_name}}</a> , {{$jobs->created_at->diffForHumans(\Carbon\Carbon::now())}}</p>
            </div>
            <div class="col-md-3">
               <div class="f_buttonview">
                  @if($jobs->job_id == null)
                     <button type="button" class="btn btn-default pull-right f_buttonview f_viewjob sendJobReqButton" data-toggle="modal" data-target="#jobRequestModal" data-id="{{$jobs->id}}"> REQUEST JOB </button>
                  @endif
                  @if($jobs->job_id != null)
                     <button type="button" class="btn btn-default pull-right f_buttonview f_viewjob sendJobReqButton" data-toggle="modal" data-target="#jobRequestModal" data-id="{{$jobs->id}}" disabled> APPLIED </button>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
            {{$all_jobs->links()}}
      </div>
   </div>
</section>

<!-- Subject Edit Modal -->
<div class="modal fade" id="jobRequestModal" tabindex="-1" role="dialog" 
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
                        <span class="subjModalHeading"></span> Job Request
                    </h4>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    <form role="form" id="sendRequest" method="post" action="{{route('request_job')}}">
                      <div class="form-group">
                        <label for="task">Offer Description</label>
                          <textarea class="form-control" name="description" rows="4" required></textarea> 
                          <input type="hidden" name="job_id" id="job_id" value="">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      </div>           
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn f_viewjob ">
                        
                        <span class="subjModalHeading"></span> Send Request
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>

@endsection