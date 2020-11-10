@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding ">
   @include('dashboard.partials.dashboard-sidebar')
	<div class="col-md-9 bg_color_gray">
    	<div class="edit_profile padding_down_s">
    		<h3 class="f_profile_content text-center">Request a Job</h3>
    	</div>
    	
		@include('partials.error_section')
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="{{route('student_postJob_req')}}" method="post">
					{{csrf_field()}}
					<div class="form-group profile_form s_profile_form">
						<label>Title <span>*</span></label>
						<br>
             			<input type="text" name="title" class="form-control span3" required>
					</div>
					<div class="form-group profile_form s_profile_form">
						<label>Subjects <span>*</span></label>
						<br>

             			<select class="form-control span3 " name="subject_id" required>
             			@if(isset($subjects))
			                @foreach($subjects as $subject)
			                	<option value="{{$subject->id}}">{{$subject->subject}}</option>
			                @endforeach
			            @endif
						</select>
					</div>
					<div class="form-group profile_form s_profile_form">
						<label>Date <span>*</span></label>
						<br>
             			<input type="date" name="date" class="form-control span3" required>
					</div>
		            <div class="form-group profile_form s_profile_form">
						<label>Type </label>
						<br>
			            <div class="s_padding_top">
			                <label class="s_container">Online
			                <input type="radio" name="lesson_type" id="lesson_type" class="online" value="1" checked="checked">
			                <span class="s_checkmark"></span>
			                </label>
			                <label class="s_container">Offline
			                <input type="radio" name="lesson_type" id="lesson_type"  value="2" class="offline">
			                <span class="s_checkmark"></span>
			                </label>
			                <label class="s_container">Full Time
			                	<input type="radio" name="lesson_type" id="lesson_type"  value="3" class="offline">
			                	<span class="s_checkmark"></span>
			                </label>
			            </div>
					</div>
           			<div class="form-group profile_form s_profile_form form_address hidden">
						<label>Address <span>*</span></label>
						<br>
             			<textarea name="address" rows="4" cols="80" class="form-control span3 job_address" disabled required></textarea>
					</div>
					<div class="form-group profile_form s_profile_form">
						<label>Details <span>*</span></label>
						<br>
             			<textarea name="details" rows="8" cols="80" class="form-control span3" required></textarea>
					</div>
					<div class="form-group">
					 	<input type="submit" value="Post" class="btn s_save">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
