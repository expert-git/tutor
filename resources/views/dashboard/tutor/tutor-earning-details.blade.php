@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')
   <div class="col-md-9 f_padding bg_color">
      @include('partials.error_section')
      <div class="col-md-9">
         <div class="edit_profile">
            <h3 class="f_profile_content">Booking Information</h3>
         </div>
      </div>
      <!--<div class="col-md-3">
         <a href="{{route('edit_dashboard')}}" class="btn btn-default f_view_edit">EDIT</a>
      </div>-->
      <div class="col-md-12">
         <p class="f_text">
           <!--  {{ isset($user->bio) ? $user->bio : '' }} -->
         </p>
      </div>
      <div class="col-md-6">
         <form>
            <div class="form-group profile_form account_view">
               <label>Title</label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->title) ? $tutor_earning_detail->title : '-' }}</p>
            </div>

            <div class="form-group profile_form account_view">
               <label>Booking date </label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->date) ? $tutor_earning_detail->date : '-' }}</p>
            </div>

            <div class="form-group profile_form account_view">
               <label>Lesson hours </label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->lesson_hours) ? $tutor_earning_detail->lesson_hours : '-' }}</p>
            </div>

			<div class="form-group profile_form account_view">
				<label>Booking details </label>
				<br>
				<p class="text_aaccountview">{{ isset($tutor_earning_detail->details) ? $tutor_earning_detail->details : '-' }}</p>
			</div>

            <div class="form-group profile_form account_view">
               <label>Amount <span></span></label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->amount) ? $tutor_earning_detail->amount : '-' }}</p>
            </div>

            <div class="form-group profile_form account_view">
               <label>Lesson Type </label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->type) ? $tutor_earning_detail->type : '-' }}</p>
            </div>                       
            <!--  <div class="form-group profile_form account_view">
               <label>Password  (Must Be Atleast 6 Characters):</label>
               <br>
               <p class="text_aaccountview">********</p>
               </div>

               <div class="form-group profile_form account_view">
               <label>Confirm Password </label>
               <br>
               <p class="text_aaccountview">********</p>

               </div> -->
            <div class="clearfix"></div>
         </form>
      </div>
      <div class="col-md-6">
            <div class="form-group account_f_form view_f">
               <label>Student</label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->first_name) ? $tutor_earning_detail->first_name : '-' }}</p>
            </div>      
            <div class="form-group account_f_form view_f">
               <label>Subject</label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->subject) ? $tutor_earning_detail->subject : '-' }}</p>
            </div>
            <div class="form-group account_f_form view_f">
               <label>Booking Status</label>
               <br>
               <p class="text_aaccountview">{{ isset($tutor_earning_detail->status) ? $tutor_earning_detail->status : '-' }}</p>
            </div>
			<div class="form-group profile_form account_view">
				<label>Booking Location </label>
				<br>
				<p class="text_aaccountview">{{ isset($tutor_earning_detail->location) ? $tutor_earning_detail->location : '-' }}</p>
			</div>

			<div class="form-group profile_form account_view">
				<label>Booking Address </label>
				<br>
				<p class="text_aaccountview">{{ isset($tutor_earning_detail->address) ? $tutor_earning_detail->address : '-' }}</p>
			</div>			
            <div class="clearfix"></div>
      </div>
   </div>
</div>
@endsection