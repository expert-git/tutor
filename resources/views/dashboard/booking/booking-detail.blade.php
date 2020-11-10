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
      <!-- <div class="col-md-3">
         <a href="{{route('edit_dashboard')}}" class="btn btn-default f_view_edit">EDIT</a>
      </div> -->
      <div class="col-md-12">
         <p class="f_text">
           <!--  {{ isset($user->bio) ? $user->bio : '' }} -->
         </p>
      </div>
      <div class="col-md-6">
         <form>
            <div class="form-group profile_form account_view">
               <label>Tutor Name </label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->first_name) ? $booking_detail->first_name : '-' }}</p>
            </div>

            <div class="form-group profile_form account_view">
               <label>Tutor Address </label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->address) ? $booking_detail->address : '-' }}</p>
            </div>

            <div class="form-group profile_form account_view">
               <label>Tutor Email </label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->email) ? $booking_detail->email : '-' }}</p>
            </div>

               <div class="form-group profile_form account_view">
                  <label>Lesson Hours </label>
                  <br>
                  <p class="text_aaccountview">{{ isset($booking_detail->lesson_hours) ? $booking_detail->lesson_hours : '-' }}</p>
               </div>

            <div class="form-group profile_form account_view">
               <label>Amount <span></span></label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->amount) ? $booking_detail->amount : '-' }}</p>
            </div>

            <div class="form-group profile_form account_view">
               <label>Lesson Type </label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->type) ? $booking_detail->type : '-' }}</p>
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
               <label>Lesson Date</label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->date) ? date("M jS, Y", strtotime($booking_detail->date)) : '-' }}</p>
            </div>      
            <div class="form-group account_f_form view_f">
               <label>Title</label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->title) ? $booking_detail->title : '-' }}</p>
            </div>
            <div class="form-group account_f_form view_f">
               <label>Status</label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->status) ? $booking_detail->status : '-' }}</p>
            </div>
            <div class="clearfix"></div>

            <div class="form-group  account_f_form view_f">
               <label>Job detail </label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->details) ? $booking_detail->details : '-' }}</p>
            </div>
                                    
            <div class="form-group  account_f_form view_f">
               <label>Subject</label>
               <br>
               <p class="text_aaccountview">{{ isset($booking_detail->subject) ? $booking_detail->subject : '-' }}</p>
            </div>

      </div>
   </div>
</div>
@endsection
